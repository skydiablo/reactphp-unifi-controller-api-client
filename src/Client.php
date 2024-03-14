<?php

namespace SkyDiablo\Ubiquiti\Unifi\Controller\ApiClient;

use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

class Client
{

    protected Browser $browser;

    public function __construct(string $baseUri)
    {
        $connector = new \React\Socket\Connector([
            'dns' => false,
            'tls' => [
                'verify_peer' => false,
                'verify_peer_name' => false
            ]
        ]);
        $this->browser = (new Browser($connector))->withBase($baseUri);
    }

    protected function defaultHeader()
    {
        return [];
    }

    /**
     * @param string $uri
     * @param array $header
     * @return PromiseInterface<array>
     */
    protected function httpGet(string $uri, array $header = []): PromiseInterface
    {
        return $this->browser->get($uri, $header + $this->defaultHeader())->then(function (ResponseInterface $response) {
            var_dump($response->getHeaders());
            return json_decode($response->getBody()->getContents(), true);
        });
    }

    public function login()
    {
        $this->httpGet('/')->then(function ($data) {
            var_dump($data);
        });
    }


}