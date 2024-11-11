<?php

namespace TurboSMTP\Services;

require '../vendor/autoload.php'; // Include Composer autoloader

use GuzzleHttp\Client;

class TurboSMTPService {
    protected $api = null;
    protected $client = null;

    function __construct() {
        $this->client = new Client([
            'verify' => false
        ]);
    }

}
