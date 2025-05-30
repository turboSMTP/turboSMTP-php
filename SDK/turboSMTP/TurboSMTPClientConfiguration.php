<?php

namespace TurboSMTP;

class TurboSMTPClientConfiguration {
    // Private static instance for Singleton
    private static ?TurboSMTPClientConfiguration $instance = null;
    private static bool $lock = false;

    // Public properties
    public string $consumerKey;
    public string $consumerSecret;
    public bool $europeanUser;
    public $timeZone;

    // Private constructor to prevent direct instantiation
    private function __construct() {
        $this->timeZone = null; // default value
    }

    // Static method to get the Singleton instance
    public static function getInstance() {
        if (self::$instance === null) {
            // Use a lock to ensure thread-safety (though PHP is single-threaded)
            if (!self::$lock) {
                self::$lock = true;
                self::$instance = new TurboSMTPClientConfiguration();
                self::$lock = false;
            }
        }
        return self::$instance;
    }

    // Builder class
    public static function builder() {
        return new TurboSMTPClientConfigurationBuilder();
    }
}