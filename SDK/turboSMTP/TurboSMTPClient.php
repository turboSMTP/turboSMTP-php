<?php

namespace TurboSMTP;

require '../vendor/autoload.php'; // Include Composer autoloader

use TurboSMTP\Services\EmailMessages;
use GuzzleHttp\Client;
use API_TurboSMTP_Invoker\Configuration;

final class TurboSMTPClient{

    public function __construct(TurboSMTPClientConfiguration $turbo_smtp_client_configuration) {
        $configuration = new Configuration();
        $configuration->setApiKey('consumerKey', $turbo_smtp_client_configuration->consumerKey);
        $configuration->setApiKey('consumerSecret',$turbo_smtp_client_configuration->consumerSecret);        
        $this->EmailMessages = new EmailMessages($configuration);
    }

    private $EmailMessages;

    public function getEmailMessages(): EmailMessages
    {
        return $this->EmailMessages;
    }

}