<?php

require dirname(__DIR__) . '/vendor/autoload.php';

$client = new \RegisterCh\Client(
    [
        'debug' => true,
        'base_uri' => 'https://api.register.ch',
        'registerch_api_key' => 'XXXX',
        'registerch_api_secret' => 'YYYY'
    ]
);

$body = new \stdClass();
$body->servicepack_id = 0;
$body->identifier = 'identifier.eu';

// Create hosting account
$response = $client->post('/v2/accounts', ['json' => $body]);

// Dump location header with link to provisioning job
var_dump(
    $response->getHeader('Location')
);