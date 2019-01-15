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
        $api_key='97ba90df5d07460aa5daba1bee86f11d';
        $client = new \GuzzleHttp\Client(
            ['headers' => [
                'Authorization' => 'Bearer '.$api_key,
                'Content-Type' => 'application/json']
            ]
        );
        $response = $client->request('GET', 'https://staging-api.yousign.com/users');

        echo $response->getBody(); # '{"id": 1420053, "name": "guzzle", ...}'
    }
}
