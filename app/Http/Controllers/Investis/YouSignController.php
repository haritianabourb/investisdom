<?php
/**
 * Created by PhpStorm.
 * User: imthecatinthebox
 * Date: 15.01.2019
 * Time: 17:40
 */

namespace App\Http\Controllers\Investis;
use Voyager;
class YouSignController extends VoyagerBaseController
{

    public function TestRequests()
    {
        $pdf_path=base_path()."/public/PDFs/samplepdf.pdf";
        $pdf_data=file_get_contents($pdf_path);

        $encoded_pdf= base64_encode($pdf_data);


        $api_key='97ba90df5d07460aa5daba1bee86f11d';
        $client = new \GuzzleHttp\Client(
            ['headers' => [
                'Authorization' => 'Bearer '.$api_key,
                'Content-Type' => 'application/json']
            ]
        );

        /*Sending file to YouSign server*/
        $file_request_body=json_encode(
            array(
                'name' => 'Document.pdf',
                'content' => $encoded_pdf),
            JSON_FORCE_OBJECT);
        $response_file=$client->request('POST', 'https://staging-api.yousign.com/files', ['body' => $file_request_body]);
        $response_file_decoded=json_decode($response_file->getBody());


        $uploaded_file_id=$response_file_decoded->id;

        /*Getting number of pages*/

        $file_properties=$client->request('GET', 'https://staging-api.yousign.com'
            .$uploaded_file_id.'/layout');
//        echo $file_properties->getBody();

        $file_properties=json_decode($file_properties->getBody(), true);

//        echo '<pre>';
//        print_r($file_properties["pages"][0]["width"]);
//        echo '</pre>';
        $page_count=count($file_properties["pages"]);
        $page_width=$file_properties["pages"][0]["width"];
        $page_height=$file_properties["pages"][0]["height"];

//        echo $page_width.'<br>';
//        echo $page_height.'<br>';
//        echo $page_count.'<br>';

//        return;
        $nom = 'Soundi';
        $prenom= 'Fica';
        $phone= '+33754284387';
        $email='soundifica@gmail.com';
        $position_string = (intval($page_width)-157).",".(intval("30")).",".
            (intval($page_width)-25).",".(intval("97"));
        $procedure_request_body=
        "{ ".
            "\"name\": \"Signing Procedure\",".
            "\"description\": \"Powerful! Here is the description of my first procedure with emails\",".
            "\"members\": ".
                "[".
                    "{ ".
                        "\"firstname\": \"".$nom."\",".
                        "\"lastname\": \"".$prenom."\",".
                        "\"email\": \"".$email."\",".
                        "\"phone\": \"".$phone."\",".
                        "\"fileObjects\": ".
                        "[".
                            "{".
                                "\"file\": \"".$uploaded_file_id."\",".
                                "\"page\": ".$page_count.",".
                                "\"position\": \"".$position_string."\",".
                                "\"mention\": \"Read and approved\",".
                                "\"mention2\": \"Signed by ".$nom." ".$prenom."\"" .
                            "}".
                        "]".
                    "}".
                "],".
            "\"config\": ".
                "{".
                    "\"email\": ".
                        "{ ".
                            "\"member.started\": ".
                                "[ ".
                                    "{".
                                        "\"subject\": \"Hey! You are invited to sign!\", ".
                                        "\"message\": \"Hello <tag data-tag-type=\\\"string\\\" data-tag-name=\\\"recipient.firstname\\\"></tag> <tag data-tag-type=\\\"string\\\" data-tag-name=\\\"recipient.lastname\\\"></tag>, <br><br> You have ben invited to sign a document, please click on the following button to read it: <tag data-tag-type=\\\"button\\\" data-tag-name=\\\"url\\\" data-tag-title=\\\"Access to documents\\\">Access to documents</tag>\", ".
                                        "\"to\": [\"@member\"] ".
                                    "} ".
                                "], ".
                            "\"procedure.started\": ".
                                "[ ".
                                    "{ ".
                                        "\"subject\": \"John, created a procedure your API have.\", ".
                                        "\"message\": \"The content of this email is totally awesome.\", ".
                                        "\"to\": [\"@creator\", \"@members\", \"billing@yousign.fr\"] ".
                                    "} ".
                                "] ".
                        "} ".
                "}".
        "}";
//        echo '<pre>';
        print_r(htmlspecialchars($procedure_request_body));
//        echo '</pre>';
//        return;

        $response_procedure=$client->request('POST', 'https://staging-api.yousign.com/procedures',
            ['body' => $procedure_request_body]);

        echo $response_procedure->getBody();
    }
}
