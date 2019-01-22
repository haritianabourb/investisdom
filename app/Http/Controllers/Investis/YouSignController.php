<?php
/**
 * Created by PhpStorm.
 * User: imthecatinthebox
 * Date: 15.01.2019
 * Time: 17:40
 */

namespace App\Http\Controllers\Investis;

use PDF;


class YouSignController extends VoyagerBaseController
{

    public function TestRequests()
    {

        $pdf_data = PDF::loadView('testview');
        $encoded_pdf = base64_encode($pdf_data->output());

        $api_key = env("YOUSIGN_APP_KEY", "");
        $client = new \GuzzleHttp\Client(
            ['headers' => [
                'Authorization' => 'Bearer ' . $api_key
            ]
            ]
        );

        /*Sending file to YouSign server*/
        $file_request_body = [
            'name' => 'Document.pdf',
            'content' => $encoded_pdf
        ];

        $response_file = $client->request('POST', 'https://staging-api.yousign.com/files', ['json' => $file_request_body]);
        $response_file_decoded = json_decode($response_file->getBody());

        $uploaded_file_id = $response_file_decoded->id;

        /*Getting number of pages*/

        $file_properties = $client->request('GET', 'https://staging-api.yousign.com'
            . $uploaded_file_id . '/layout');

        $file_properties = json_decode($file_properties->getBody(), true);

        $page_count = count($file_properties["pages"]);
        $page_width = $file_properties["pages"][0]["width"];
        $page_height = $file_properties["pages"][0]["height"];


        /*Here go the variables*/
        $nom = 'Soundi';
        $prenom = 'Fica';
        $phone = '+33754284387';
        $email = 'soundifica@gmail.com';

        /*Here is the string $position_string to calculate position. I calculate it
        dynamically as we discussed before but for different documents it
        might be need to be set statically. Use tool https://placeit.yousign.fr/
        to get coordinates :) Documentation for this can be found at
        https://dev.yousign.com/#1fbfe3b0-774a-41f6-8d30-edcf0e281ddc */


        $position_string = (intval($page_width) - 157) . "," . (intval("30")) . "," .
            (intval($page_width) - 25) . "," . (intval("97"));

        $procedure_request_body = [
            "name" => "Signing Procedure",
            "description" => "Powerful! Here is the description of my first procedure with emails",
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
                    "firstname" => $nom,
                    "lastname" => $prenom,
                    "email" => $email,
                    "phone" => $phone,
                    "fileObjects" => [
                        [
                            "file" => $uploaded_file_id,
                            "page" => $page_count,
                            "position" => "" . $position_string,
                            "mention" => "Read and approved",
                            "mention2" => "Signed by $nom $prenom."
                        ]
                    ],
                ],
            ],
            "config" => [
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
            ]
        ];


        $response_procedure = $client->request('POST', 'https://staging-api.yousign.com/procedures',
            ['json' => $procedure_request_body]);
    }
}
