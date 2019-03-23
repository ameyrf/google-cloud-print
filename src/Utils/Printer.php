<?php

namespace GoogleCloudPrint\Utils;

use GoogleCloudPrint\Api\ProcessInviteEntity;
use GoogleCloudPrint\GooglePrintClient\GooglePrintClient;

class Printer
{
    public function processInvite(string $googlePrinterId)
    {
        $googlePrintClient = new GooglePrintClient();
        $httpClient = $googlePrintClient->getAuthorisedClient();
        $processInviteEntity = new ProcessInviteEntity($googlePrinterId);

        $response = $httpClient->request(
            'POST',
            $processInviteEntity->getUrl(),
            $processInviteEntity->toArray()
        );

        return $response->getBody()->getContents();
    }
}
