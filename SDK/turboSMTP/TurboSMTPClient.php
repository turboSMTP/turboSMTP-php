<?php

namespace TurboSMTP;

use TurboSMTP\Services\EmailMessages;
use TurboSMTP\Services\Relays;
use API_TurboSMTP_Invoker\Configuration;

final class TurboSMTPClient{

    public function __construct(TurboSMTPClientConfiguration $turbo_smtp_client_configuration) {
        $configuration = new Configuration();
        $configuration->setApiKey('consumerKey', $turbo_smtp_client_configuration->consumerKey);
        $configuration->setApiKey('consumerSecret',$turbo_smtp_client_configuration->consumerSecret);        
        $this->EmailMessages = new EmailMessages($turbo_smtp_client_configuration,$configuration);
        $this->Relays = new Relays($turbo_smtp_client_configuration,$configuration);
    }

    private $EmailMessages;
    private $Relays;

    public function getEmailMessages(): EmailMessages
    {
        return $this->EmailMessages;
    }

    public function getRelays(): Relays
    {
        return $this->Relays;
    }

}