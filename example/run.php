<?php

use SkyDiablo\Ubiquiti\Unifi\Controller\ApiClient\Client;

include __DIR__ . '/../vendor/autoload.php';

$baseUri = 'https://10.50.0.129:8443';
$client = new Client($baseUri);

$client->login();