<?php

namespace GoogleCloudPrint\GooglePrintClient;

class GooglePrintClient
{
    protected $serviceFile;

    public function __construct()
    {
        $this->serviceFile = getenv('GOOGLE_SERVICE_ACCOUNT_JSON_FILE_PATH');
        if (!$this->serviceFile) {
            throw new \Exception('Set env GOOGLE_SERVICE_ACCOUNT_JSON_FILE_PATH to path of json file');
        }
    }

    public function getAuthorisedClient()
    {
        $client = new \Google_Client();
        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . $this->serviceFile);
        $client->useApplicationDefaultCredentials();
        $client->addScope('https://www.googleapis.com/auth/cloudprint');
        $httpClient = $client->authorize();
        return $httpClient;
    }
}