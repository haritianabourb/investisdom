<?php

namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use TCG\Voyager\Models\DataType;

trait YousignProcedure
{

    protected $yousignClient;
    protected $yousignProcedure;
    protected $yousignFiles;
    protected $yousignFileProperties;
    protected $yousignSignatures;
    protected $yousignPosition;
    protected $yousignMembers;
    protected $yousignAuthorSignaturePosition;
    protected $yousignMemberSignaturePosition;
    protected $yousignUrl;
    protected $yousignUser;

    private function getYousignClient()
    {
        if (!$this->yousignClient) {
            $api_key = env("YOUSIGN_APP_KEY", "");
            $this->yousignUrl = env("YOUSIGN_APP_HOST", "");
            $this->yousignUser = env("YOUSIGN_APP_USER", "");
            $this->yousignClient = new \GuzzleHttp\Client(
                [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $api_key
                    ]
                ]
            );
        }

        return $this->yousignClient;
    }

    private function getYousignProcedure()
    {
        if (!$this->yousignProcedure) {
            try {
                $request = [
                    "name" => $this->getYousignName(),
                    "description" => $this->getYousignDescription(),
                    "ordered" => true,
                    "expiresAt" => \Carbon\Carbon::now()->addDays(15)->format("Y-m-d"),
                    "start" => false,
                    "config" => $this->getYousignConfig()
                ];

                $yousignProcedure = $this->getYousignClient()->request('POST', "{$this->yousignUrl}/procedures",
                    ['json' => $request]);

            } catch (\GuzzleHttp\Exception\GuzzleException $e) {

                $context = [
                    "context" => __("error.yousign.procedure_init.context"),
                    "description" => __("error.yousign.procedure_start.description"),
                    "request" => collect($request)->except("config")->toArray(),
                    "response" => [
                        "reason" => $e->getResponse()->getReasonPhrase(),
                        "message" => $e->getResponse()->getBody()->getContents(),
                        "code" => $e->getResponse()->getStatusCode(),
                    ],
                    "error" => [
                        'code' => $e->getCode(),
                        'message' => $e->getMessage()
                    ]

                ];

                throw new \Error(json_encode($context));

            }
            $this->yousignProcedure = json_decode($yousignProcedure->getBody()->getContents());

        }

        return $this->yousignProcedure;
    }

    private function getYousignFile()
    {
        //TODO make it as conf, doesn't it?
        $response_file_decoded = [];
        if (!$this->yousignFiles) {
            // Ok it exist,
            foreach ($files = $this->getFiles() as $name => $file) {
                $encoded_pdf = base64_encode($file);
                $request = [
                    'procedure' => $this->getYousignProcedure()->id,
                    'name' => $name,
                    'content' => $encoded_pdf,
                    'type' => 'signable'
                ];

                $response_file = $this->getYousignClient()->request('POST', "{$this->yousignUrl}/files", ['json' => $request]);
                $response_file_decoded[] = json_decode($response_file->getBody()->getContents());

            }

            $this->yousignFiles = $response_file_decoded;
        }

        return $this->yousignFiles;
    }

    private function getYousignMembers()
    {
        if (!$this->yousignMembers) {
            $this->yousignMembers = [];

            $yousignMembers = [];
            $yousignClient = $this->getYousignClient();

            $this->getMembers()->transform(function ($user) use (&$yousignMembers, $yousignClient) {
                $user->put("procedure", $this->getYousignProcedure()->id);

                try {
                    $request = $user->except('fileObjects')->toArray();

                    $yousignProcedure = $yousignClient->request('POST', "{$this->yousignUrl}/members", [
                        'json' => $request
                    ]);

                } catch (\GuzzleHttp\Exception\GuzzleException $e) {
                    $context = [
                        "context" => __("error.yousign.procedure_members.context"),
                        "description" => __("error.yousign.procedure_members.description"),
                        "additional" => [
                            "user" => $user,
                        ],
                        "request" => collect($request)->except("config")->toArray(),
                        "response" => [
                            "reason" => $e->getResponse()->getReasonPhrase(),
                            "message" => $e->getResponse()->getBody()->getContents(),
                            "code" => $e->getResponse()->getStatusCode(),
                        ],
                        "error" => [
                            'code' => $e->getCode(),
                            'message' => $e->getMessage()
                        ]

                    ];

                    throw new \Error(json_encode($context));
                }

                $yousignUser = json_decode($yousignProcedure->getBody()->getContents());

                $user->put('id', $yousignUser->id);

                if ($user->get("fileObjects")) {

                    $user->get("fileObjects")->transform(function ($fileObject, $fileName) use ($user) {
                        foreach ($files = $this->getYousignFile() as $file) {
                            if ($fileName == $file->name) {
                                foreach ($fileObject as $key => $fo) {
                                    $fo["member"] = $user->get("id");
                                    $fo["file"] = $file->id;

                                    $fileObject[$key] = $fo;
                                }
                            }
                        }

                        return $fileObject;
                    });

                    $yousignUser->fileObjects = $user->get("fileObjects")->values()->collapse()->all();
                }


                $yousignMembers[] = $yousignUser;

                return $user;

            });

            $this->yousignMembers = $yousignMembers;

        }

        return $this->yousignMembers;
    }

    public function getYousignSignatures()
    {
        if (!$this->yousignSignatures) {
            $this->yousignSignatures = [];

            foreach ($users = $this->getYousignMembers() as $user) {
                foreach ($user->fileObjects as $fileObjects) {

                    try {
                        $request = $fileObjects;
                        $yousignProcedure = $this->getYousignClient()->request('POST', "{$this->yousignUrl}/file_objects", [
                            'json' => $request
                        ]);
                    } catch (\GuzzleHttp\Exception\GuzzleException $e) {
                        $context = [
                            "context" => __("error.yousign.procedure_signatures.context"),
                            "description" => __("error.yousign.procedure_signatures.description"),
                            "request" => collect($request)->except("config")->toArray(),
                            "response" => [
                                "reason" => $e->getResponse()->getReasonPhrase(),
                                "message" => $e->getResponse()->getBody()->getContents(),
                                "code" => $e->getResponse()->getStatusCode(),
                            ],
                            "error" => [
                                'code' => $e->getCode(),
                                'message' => $e->getMessage()
                            ]

                        ];

                        throw new \Error(json_encode($context));
                    }

                    $this->yousignSignatures [] = json_decode($yousignProcedure->getBody()->getContents());
                }
            }
        }

        return $this->yousignSignatures;
    }

    public function getYousignName()
    {
        return $this->yousignName ?? "Signing Procedure";
    }

    public function getYousignDescription()
    {
        return $this->yousignDescription ?? "Powerful! Here is the description of my first procedure with emails";
    }

    public abstract function getFiles();

    public abstract function getMembers();

    protected function getYousignProperties()
    {
        if (!$this->yousignFileProperties) {
            $this->yousignFileProperties = [];
            foreach ($files = $this->getYousignFile() as $file) {

                $file_properties = $this->getYousignClient()->request('GET', "{$this->yousignUrl}{$file->id}/layout");

                $file_properties = json_decode($file_properties->getBody(), true);

                $page_count = count($file_properties["pages"]);
                $page_width = $file_properties["pages"][0]["width"];
                $page_height = $file_properties["pages"][0]["height"];

                $this->yousignFileProperties[$file->id] = [
                    "page_count" => $page_count,
                    "page_width" => $page_width,
                    "page_height" => $page_height
                ];
            }
        }

        return $this->yousignFileProperties;
    }


    public function yousignStartProcedure()
    {

        // Step 1: create the procedure
        $this->getYousignProcedure();

        // Step 2: Add the files
        $this->getYousignFile();

        // Step 3: Add the members
        $this->getYousignMembers();

        // Step 4: signatures objects files
        $this->getYousignSignatures();

        try {

            $request = [
                "start" => true
            ];

            $yousignProcedure = $this->getYousignClient()
                ->request('PUT', $this->yousignUrl . $this->getYousignProcedure()->id, ['json' => $request]);

        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            $context = [
                "context" => __("error.yousign.procedure_start.context"),
                "description" => __("error.yousign.procedure_start.description"),
                "request" => collect($request)->except("config")->toArray(),
                "response" => [
                    "reason" => $e->getResponse()->getReasonPhrase(),
                    "message" => $e->getResponse()->getBody()->getContents(),
                    "code" => $e->getResponse()->getStatusCode(),
                ],
                "error" => [
                    'code' => $e->getCode(),
                    'message' => $e->getMessage()
                ]

            ];

            throw new \Error(json_encode($context));
        }


        $this->yousignProcedure = json_decode($yousignProcedure->getBody()->getContents());

        return $this->yousignReturnView();
    }

    public function yousignReturnView()
    {
        return response()->json($this->getYousignProcedure());
    }

    public function getYousignConfig()
    {
        return [
            //TODO make it as configurable
            "email" => [
                "member.started" => [
                    [
                        "subject" => __("yousign.email.member.started.subject"),
                        "message" => __("yousign.email.member.started.message"),
                        "to" => ["@member"],
                    ]
                ],
                "procedure.started" => [
                    [
                        "subject" => __("yousign.email.procedure.started.subject"),
                        "message" => __("yousign.email.procedure.started.message"),
                        "to" => ["@creator"],
                    ]
                ]
            ]
        ];
    }

    public function isExistingYousignProcedure($yousignProcedure)
    {
        if ($yousignProcedure && $yousignProcedure != "null") {
            return json_decode($yousignProcedure);
        }

        return false;
    }


}