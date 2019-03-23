<?php

namespace GoogleCloudPrint\Api;

class ProcessInviteEntity
{
    private $url = 'https://www.google.com/cloudprint/processinvite';

    private $printerId;

    private $accept = 'true';

    public  function __construct(string $printerId)
    {
        $this->printerId = $printerId;
    }

    /**
     * @return mixed
     */
    public function getPrinterId()
    {
        return $this->printerId;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getAccept(): string
    {
        return $this->accept;
    }

    public function toArray()
    {
        return [
            'multipart' => [
                [
                    'name' => 'printerid',
                    'contents' => $this->getPrinterId()
                ],
                [
                    'name' => 'accept',
                    'contents' => $this->getUrl()
                ],
            ],
        ];
    }
}