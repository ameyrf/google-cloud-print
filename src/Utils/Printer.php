<?php

namespace GoogleCloudPrint\Utils;

use GuzzleHttp\Client;

class Printer
{
    protected static $url = 'https://ai.live.ameyindustries.in/sizes/view/1.json';

    /**
     * Send print
     *
     */
    public static function sendPrint()
    {
        $client = new Client();

        $response = $client->get(self::$url);

        echo $response->getBody();
    }
}