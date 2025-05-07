<?php

namespace TurboSMTP;

use API_TurboSMTP_Invoker\Configuration;

use TurboSMTP\Services\EmailMessages;
use TurboSMTP\Services\Relays;
use TurboSMTP\Services\EmailValidator;
use TurboSMTP\Services\EmailValidatorFiles;
use TurboSMTP\Services\Suppressions;

final class TurboSMTPClient{

    public function __construct(TurboSMTPClientConfiguration $turbo_smtp_client_configuration) {
        $configuration = new Configuration();
        $configuration->setApiKey('consumerKey', $turbo_smtp_client_configuration->consumerKey);
        $configuration->setApiKey('consumerSecret',$turbo_smtp_client_configuration->consumerSecret);        
        
        $this->EmailMessages = new EmailMessages($turbo_smtp_client_configuration,$configuration);
        $this->Relays = new Relays($turbo_smtp_client_configuration,$configuration);
        $this->EmailValidator = new EmailValidator($turbo_smtp_client_configuration,$configuration);
        $this->EmailValidatorFiles = new EmailValidatorFiles($turbo_smtp_client_configuration,$configuration);
        $this->Suppressions = new Suppressions($turbo_smtp_client_configuration,$configuration);
    }

    private EmailMessages $EmailMessages;
    private Relays $Relays;
    private EmailValidator $EmailValidator;
    private EmailValidatorFiles $EmailValidatorFiles;
    private Suppressions $Suppressions;

    public function getEmailMessages(): EmailMessages
    {
        return $this->EmailMessages;
    }

    public function getRelays(): Relays
    {
        return $this->Relays;
    }

    public function getEmailValidator(): EmailValidator
    {
        return $this->EmailValidator;
    }

    public function getEmailValidatorFiles(): EmailValidatorFiles
    {
        return $this->EmailValidatorFiles;
    }

    public function getSuppressions(): Suppressions
    {
        return $this->Suppressions;
    }

}