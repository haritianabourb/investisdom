<?php

namespace App\Http\Traits;

trait YousignProcedure {

    protected $yousignClient;
    protected $yousignProcedure;
    protected $yousignFile;
    protected $yousignFileProperties;
    protected $yousignPosition;
    protected $yousignUrl;
    protected $yousignUser;

    public function getYousignClient(){
        if(!$this->yousignClient){
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

    public function getYousignFile(){
        //TODO make it as conf, doesn't it?
        if(!$this->yousignFile){
            $encoded_pdf = base64_encode($this->getFile());
            $file_request_body = [
                'name' => $this->yousignFileName ?? 'Document.pdf',
                'content' => $encoded_pdf
            ];

            $response_file = $this->getYousignClient()->request('POST', "{$this->yousignUrl}/files", ['json' => $file_request_body]);
            $response_file_decoded = json_decode($response_file->getBody());

            $this->yousignFile = $response_file_decoded->id;
        }

        return $this->yousignFile;
    }

    public function getYousignName(){
        return $this->yousignName ?? "Signing Procedure";
    }

    public function getYousignDescription()
    {
        return $this->yousignDescription ?? "Powerful! Here is the description of my first procedure with emails";
    }

    public function getFile(){}
    public function getMember(){}

    protected function getYousignProperties(){
        if(!$this->yousignFileProperties){
            $file_properties = $this->getYousignClient()->request('GET', "{$this->yousignUrl}{$this->getYousignFile()}/layout");

            $file_properties = json_decode($file_properties->getBody(), true);

            $page_count = count($file_properties["pages"]);
            $page_width = $file_properties["pages"][0]["width"];
            $page_height = $file_properties["pages"][0]["height"];

            $this->yousignFileProperties = [
                "page_count" => $page_count,
                "page_width" => $page_width,
                "page_height" => $page_height
            ];
        }

        return $this->yousignFileProperties;
    }

    public function getMemberSignaturePosition(){
        return $this->yousignMemberSignaturePosition ??
            (intval($this->getYousignProperties()["page_width"]) - 157) . "," . (intval("30")) . ","
            . (intval($this->getYousignProperties()["page_width"]) - 25) . "," . (intval("97"));
    }

    public function getAuthorSignaturePosition(){
        return $this->yousignMemberSignaturePosition ?? "157,30,25,97";
    }

    public function yousign(){
        $member = $this->getMember();

        $procedure_request_body = [
            "name" => $this->getYousignName(),
            "description" => $this->getYousignDescription(),
            "members" => [

//                [
//                    "user" => "2Fc73c6dd5-06ff-419e-a283-8ab68c719a5d",
//                    "fileObjects" => [
//                        [
//                            "file" => $uploaded_file_id,
//                            "page" => $page_count,
//                            "position" => "" . $position_string,
//                            "mention" => "Read and approved",
//                            "mention2" => "Signed by $nom $prenom."
//                        ]
//                    ],
//                ],
                [
                    "firstname" => $member["nom"],
                    "lastname" => $member["prenom"],
                    "email" => $member["email"],
                    "phone" => $member["phone"],
                    "fileObjects" => [
                        [
                            "file" => $this->getYousignFile(),
                            "page" => $this->getYousignProperties()["page_count"],
                            "position" => "" . $this->getMemberSignaturePosition(),
                            "mention" => "Read and approved",
                            "mention2" => "Signed by {$member["nom"]} {$member["prenom"]}."
                        ]
                    ],
                ],
            ],
            "config" => $this->getYousignConfig(),
        ];


        $response = $this->getYousignClient()->request('POST', "{$this->yousignUrl}/procedures",
            ['json' => $procedure_request_body]);

        return $this->yousignReturnView() ?? response()->json(json_decode($response->getBody()->getContents()));
    }

    public function yousignReturnView(){
        return null;
    }

    public function getYousignSignatureOnEachPages(){
        if(is_null($this->yousignSignatureOnEachPage)){
            $this->getYousignSignatureOnEachPages = false;
        }

        return $this->getYousignSignatureOnEachPages;
    }

    public function getYousignConfig(){
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