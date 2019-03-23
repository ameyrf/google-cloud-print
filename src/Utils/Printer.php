<?php

namespace GoogleCloudPrint\Utils;

use GoogleCloudPrint\Api\ProcessPrinterInviteEntity;
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
        $processPrinterInviteEntity = new ProcessPrinterInviteEntity($this->printerId);

        $response = $httpClient->request(
            'POST',
            $processPrinterInviteEntity->getUrl(),
            $processPrinterInviteEntity->toArray()
        );

        return $response->getBody()->getContents();
    }

    public function printPdf(){}

    public function printText(){}

    public function printImage(){}
}
