<?php

namespace GoogleCloudPrint\Utils;

use GoogleCloudPrint\Api\ProcessInviteEntity;
use GoogleCloudPrint\GooglePrintClient\GooglePrintClient;

class Printer
{
    private $printerId;

    public function __construct(string $printerId)
    {
        $this->printerId = $printerId;
    }

    public function processInvite()
    {
        $googlePrintClient = new GooglePrintClient();
        $httpClient = $googlePrintClient->getAuthorisedClient();
        $processInviteEntity = new ProcessInviteEntity($this->printerId);

        $response = $httpClient->request(
            'POST',
            $processInviteEntity->getUrl(),
            $processInviteEntity->toArray()
        );

        return $response->getBody()->getContents();
    }
}
