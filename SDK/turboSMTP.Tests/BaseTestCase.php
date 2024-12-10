<?php

namespace TurboSMTPTests;

use DateTime;
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

        $this->configuration = $configurationBuilder
            ->setConsumerKey(AppConstants::ConsumerKey)
            ->setConsumerSecret(AppConstants::ConsumerSecret)
            ->build();
    }

    public function get_full_date_time() : string
    {
        $dateTimeNow = new DateTime();

        // Format the DateTime object as a string/text
        $dateTimeString = $dateTimeNow->format('Y-m-d H:i:s');

        return $dateTimeString;
    }

    public function get_full_date_time_adding_years(int $years = 0) : string
    {
        $dateTimeNow = new DateTime();
    
        // Modify the DateTime object by adding or subtracting years
        if ($years !== 0) {
            $dateTimeNow->modify("{$years} year" . ($years > 1 ? 's' : ''));
        }
    
        // Format the DateTime object as a string/text
        $dateTimeString = $dateTimeNow->format('Y-m-d H:i:s');
    
        return $dateTimeString;
    }    
}