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

                $yousignProcedure = $this->getYousignClient()->request('POST', "{$this->yousignUrl}/procedures", [
                    'json' => $request
                ]);

            } catch (\GuzzleHttp\Exception\ClientException $e) {

                dd($request, $e->getResponse()->getBody()->getContents());

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
                $file_request_body = [
                    'procedure' => $this->getYousignProcedure()->id,
                    'name' => $name,
                    'content' => $encoded_pdf
                ];

                $response_file = $this->getYousignClient()->request('POST', "{$this->yousignUrl}/files", ['json' => $file_request_body]);
                $response_file_decoded[] = json_decode($response_file->getBody());

            }

            $this->yousignFiles = $response_file_decoded;
        }

        return $this->yousignFiles;
    }

    private function getYousignMembers()
    {
        if (!$this->yousignMembers) {
            $this->yousignMembers = [];

            foreach ($users = $this->getAuthors() as $user) {
                $user["type"] = "signer";
                $user["procedure"] = $this->getYousignProcedure()->id;
                $user["position"] = 1;

                try {

                    $yousignProcedure = $this->getYousignClient()->request('POST', "{$this->yousignUrl}/members", [
                        'json' => $user
                    ]);
                    $user = json_decode($yousignProcedure->getBody()->getContents());
                } catch (\GuzzleHttp\Exception\ClientException $e) {

                    dd("Authors", $user, $e->getResponse()->getBody()->getContents());

                }

                foreach ($files = $this->getYousignFile() as $file) {


                    $user->fileObjects[] = [
                        "file" => $file->id,
                        "page" => $this->getYousignProperties()[$file->id]["page_count"],
                        "position" => $this->getAuthorSignaturePosition()[$file->id],
                        "mention" => "Lu est approuvé",
                        "mention2" => "Signer par InvestisDOM."
                    ];

                }
                $this->yousignMembers [] = $user;
            }

            foreach ($users = $this->getMembers() as $key => $user) {
                $user["type"] = "signer";
                $user["procedure"] = $this->getYousignProcedure()->id;
                $user["position"] = 2;
                try {

                    $yousignProcedure = $this->getYousignClient()->request('POST', "{$this->yousignUrl}/members", [
                        'json' => $user
                    ]);
                    $user = json_decode($yousignProcedure->getBody()->getContents());
                } catch (\GuzzleHttp\Exception\ClientException $e) {

                    dd("Member", $user, $e->getResponse()->getBody()->getContents());

                }
                foreach ($files = $this->getYousignFile() as $file) {
                    try {
                        $user->fileObjects[] = [
                            "file" => $file->id,
                            "page" => $this->getYousignProperties()[$file->id]["page_count"],
                            "position" => $this->getMemberSignaturePosition()[$file->id],
                            "mention" => "Lu et approuvé",
                            "mention2" => "Signed par {$user->firstname} {$user->lastname}."
                        ];
                    } catch (\Exception $e) {
                        dd($user, $e);
                    }

                }
                $this->yousignMembers [] = $user;
            }

        }
        return $this->yousignMembers;
    }

    public function getYousignSignatures()
    {
        if (!$this->yousignSignatures) {
            $this->yousignSignatures = [];
            foreach ($files = $this->getYousignFile() as $file) {
                foreach ($users = $this->getYousignMembers() as $user) {
                    foreach ($user->fileObjects as $fileObjects)
                        try {
                            $fileObjects["member"] = $user->id;
                        } catch (\Exception $e) {
                            dd($users, $user, $e);
                        }
                    try {
                        $yousignProcedure = $this->getYousignClient()->request('POST', "{$this->yousignUrl}/file_objects", [
                            'json' => $fileObjects
                        ]);
                    } catch (\GuzzleHttp\Exception\ClientException $e) {

                        dd($user, $fileObjects, $e->getResponse()->getBody()->getContents());

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

    public function getAuthors()
    {

        $authors = [
            [
                'user' => "/users/" . env('YOUSIGN_APP_USER'),
            ]
        ];

        return $authors;

    }

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

    public function getMemberSignaturePosition()
    {
        if (!$this->yousignMemberSignaturePosition) {

            $this->yousignMemberSignaturePosition = [];

            foreach ($fileProperties = $this->getYousignProperties() as $fileProperty => $filePropertyValue) {
                $this->yousignMemberSignaturePosition [$fileProperty] =
                    (intval($filePropertyValue["page_width"]) - 157) . "," . (intval("30")) . ","
                    . (intval($filePropertyValue["page_width"]) - 25) . "," . (intval("97"));
            }
        }

        return $this->yousignMemberSignaturePosition;
    }

    public function getAuthorSignaturePosition()
    {
        if (!$this->yousignAuthorSignaturePosition) {

            $this->yousignAuthorSignaturePosition = [];

            foreach ($fileProperties = $this->getYousignProperties() as $fileProperty => $filePropertyValue) {
                $this->yousignAuthorSignaturePosition [$fileProperty] = "30,30,187,97";
            }
        }

        return $this->yousignAuthorSignaturePosition;
    }


    public function yousignStartProcedure()
    {

        $member = $this->member;

        // Step 1: create the procedure
        $this->getYousignProcedure();

        // Step 2: Add the files
        $this->getYousignFile();

        // Step 3: Add the members
        $this->getYousignMembers();

        // Step 4: signatures objects files
        $this->getYousignSignatures();


        try {
            $yousignProcedure = $this->getYousignClient()->request('PUT', $this->yousignUrl . $this->getYousignProcedure()->id,
                ['json' => [
                    "start" => true
                ]
                ]
            );
        } catch (\GuzzleHttp\Exception\ClientException $e) {

            dd($e->getResponse()->getBody()->getContents());

        }
        $this->yousignProcedure = json_decode($yousignProcedure->getBody()->getContents());

        return  $this->yousignReturnView();
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
                        "subject" => "Hey! You are invited to sign!",
                        "message" => "Hello <tag data-tag-type='string' data-tag-name='recipient.firstname'></tag> <tag data-tag-type='string' data-tag-name='recipient.lastname'></tag>, <br><br> You have ben invited to sign a document, please click on the following button to read it: <tag data-tag-type='button' data-tag-name='url' data-tag-title='Access to documents'>Access to documents</tag>",
                        "to" => ["@member"],
                    ]
                ],
                "procedure.started" => [
                    [
                        "subject" => "John, created a procedure your API have",
                        "message" => "The content of this email is totally awesome.",
                        "to" => ["@creator"],
                    ]
                ]
            ]
        ];
    }


}