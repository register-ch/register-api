# Register.ch public API

[![Build Status](https://travis-ci.org/register-ch/register-api.svg?branch=master)](https://travis-ci.org/register-ch/register-api)
[![Coverage Status](https://coveralls.io/repos/github/register-ch/register-api/badge.svg?branch=master)](https://coveralls.io/github/register-ch/register-api?branch=master)

The *Register.ch public API project* wraps around [Guzzle](http://docs.guzzlephp.org/en/latest/) and offers *HMAC authentication*. You can use the client to easily connect to the Register.ch public API endpoint.

To learn more about the **Register.ch public API**, go to [https://api.register.ch/](https://api.register.ch/).

## Install

```
composer require register-ch/register-api
```


## Example

The code example below registers a new domain name on your account.

```php
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
$body->domain_name = 'domain-name-to-register.eu';

// Register domain name
$response = $client->post('/v2/domains/registrations', ['json' => $body]);

// Dump location header with link to provisioning job
var_dump(
    $response->getHeader('Location')
);
```

Go to the [examples](examples) folder to see more examples.