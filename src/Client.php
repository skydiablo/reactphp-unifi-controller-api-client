<?php

namespace SkyDiablo\Ubiquiti\Unifi\Controller\ApiClient;

use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;

class Client
{

    protected Browser $browser;

    public function __construct(string $baseUri)
    {
        $this->browser = (new Browser())->withBase($baseUri);
    }

    protected function defaultHeader()
    {
        return [];
    }

    protected function httpGet(string $uri, array $header = [])
    {
        $this->browser->get($uri, $header + $this->defaultHeader())->then(function (ResponseInterface $response) {
            return json_decode($response->getBody()->getContents());
        });
    }

    protected function login()
    {

    }


}