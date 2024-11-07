<?php

namespace TurboSMTP\Services;

require '../vendor/autoload.php'; // Include Composer autoloader

use GuzzleHttp\Client;

final class TurboSMTPService {
    protected $api = null;
    protected $client = null;
 
    protected function __construct() {
        $this->client = new Client([
            'verify' => false
        ]);     
    }

}