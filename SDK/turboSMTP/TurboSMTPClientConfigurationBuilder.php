<?php

namespace TurboSMTP;


class TurboSMTPClientConfigurationBuilder {
    private $config;

    public function __construct() {
        $this->config = TurboSMTPClientConfiguration::getInstance();
    }

    public function setConsumerKey($consumerKey) {
        $this->config->consumerKey = $consumerKey;
        return $this;
    }

    public function setConsumerSecret($consumerSecret) {
        $this->config->consumerSecret = $consumerSecret;
        return $this;
    }

    public function setServerURL($serverURL) {
        $this->config->serverURL = $serverURL;
        return $this;
    }

    public function setSendServerURL($sendServerURL) {
        $this->config->sendServerURL = $sendServerURL;
        return $this;
    }

    public function setTimeZone($timeZone) {
        $this->config->timeZone = $timeZone;
        return $this;
    }

    public function build() {
        // You can add validation here if needed
        return $this->config;
    }
}