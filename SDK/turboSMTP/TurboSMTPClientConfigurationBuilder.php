<?php

namespace TurboSMTP;


class TurboSMTPClientConfigurationBuilder {
    private TurboSMTPClientConfiguration $config;

    public function __construct() {
        $this->config = TurboSMTPClientConfiguration::getInstance();
    }

    public function setConsumerKey($consumerKey) :TurboSMTPClientConfigurationBuilder
    {
        $this->config->consumerKey = $consumerKey;
        return $this;
    }

    public function setConsumerSecret($consumerSecret) :TurboSMTPClientConfigurationBuilder
    {
        $this->config->consumerSecret = $consumerSecret;
        return $this;
    }

    public function setEuropeanUser(bool $europeanUser): TurboSMTPClientConfigurationBuilder
    {
        $this->config->europeanUser = $europeanUser;
        return $this;
    }

    public function setTimeZone($timeZone) :TurboSMTPClientConfigurationBuilder
    {
        $this->config->timeZone = $timeZone;
        return $this;
    }

    public function build() : TurboSMTPClientConfiguration
    {
        // You can add validation here if needed
        return $this->config;
    }
}