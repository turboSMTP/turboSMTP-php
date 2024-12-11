<?php

namespace TurboSMTP\Services;

use GuzzleHttp\Client;
use TurboSMTP\TurboSMTPClientConfiguration;


class TurboSMTPService {
    protected $api = null;
    protected $client = null;
    protected $configuration = null;

    function __construct(TurboSMTPClientConfiguration $configuration) {
        $this->client = new Client([
            'verify' => false
        ]);
        $this->configuration = $configuration;
    }

    
}
