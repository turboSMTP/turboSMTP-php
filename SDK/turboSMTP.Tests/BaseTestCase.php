<?php

namespace TurboSMTPTests;

use PHPUnit\Framework\TestCase;
use TurboSMTP\TurboSMTPClientConfigurationBuilder;
use TurboSMTP\TurboSMTPClientConfiguration;

class BaseTestCase extends TestCase
{
    public TurboSMTPClientConfiguration $configuration;

    public function __construct(string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $configurationBuilder = new TurboSMTPClientConfigurationBuilder();

        $configuration = $configurationBuilder
            ->setConsumerKey(AppConstants::ConsumerKey)
            ->setConsumerSecret(AppConstants::ConsumerSecret)
            ->build();
    }
}