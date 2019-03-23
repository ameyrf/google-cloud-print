<?php

require dirname(__DIR__) . '/vendor/autoload.php';


$serviceAccountFilePath = dirname(__DIR__) . '/google-service-account.json';
putenv('GOOGLE_SERVICE_ACCOUNT_JSON_FILE_PATH='. $serviceAccountFilePath);
$pr = new \GoogleCloudPrint\Utils\Printer('4ab20b52-8ef8-ff32-0066-4034ce6aae99');
var_dump($pr->processInvite());


/*
$serviceAccountFilePath = dirname(__DIR__) . '/google-service-account.json';
$fileToPrint = dirname(__DIR__) . '/1T.pdf';

putenv('GOOGLE_APPLICATION_CREDENTIALS=' . $serviceAccountFilePath);
$client = new Google_Client();
$client->useApplicationDefaultCredentials();
$client->addScope('https://www.googleapis.com/auth/cloudprint');
$httpClient = $client->authorize();


$client->fetchAccessTokenWithAssertion();
$accessToken = $client->getAccessToken();
$at = $accessToken['access_token'];


$processInviteUrl = 'https://www.google.com/cloudprint/processinvite';
$options = [
    'multipart' => [
        [
            'name'     => 'printerid',
            'contents' => '4ab20b52-8ef8-ff32-0066-4034ce6aae99'
        ],
        [
            'name'     => 'accept',
            'contents' => 'true'
        ],
    ],
];
$response = $httpClient->request(
    'POST',
    $processInviteUrl,
    $options
);
echo $response->getBody()->getContents();

$r1 = [
    'multipart' => [
        [
            'name'     => 'content',
            'contents' => fopen($fileToPrint, 'r')
        ],
        [
            'name'     => 'printerid',
            'contents' => '4ab20b52-8ef8-ff32-0066-4034ce6aae99'
        ],
    ],
];

$response = $httpClient->request(
    'POST',
    'https://www.google.com/cloudprint/submit',
    $r1
);

echo $response->getBody()->getContents();

*/