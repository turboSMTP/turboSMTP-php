<?php

namespace TurboSMTP\Services;

use GuzzleHttp\Promise\PromiseInterface;

use API_TurboSMTP_Invoker\Configuration;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\EmailValidatorSubscription as InvokerEmailValidatorSubscription;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\EmailValidatorMailDetails;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\EmailAddressRequestBody;


use TurboSMTP\TurboSMTPClientConfiguration;
use TurboSMTP\Domain\EmailValidator\EmailValidatorSubscription as DomainEmailValidatorSubscription;
use TurboSMTP\Domain\EmailValidator\EmailAddressValidationStatus;
use TurboSMTP\Domain\EmailValidator\EmailAddressValidationSubStatus;
use TurboSMTP\Model\EmailValidator\EmailAddressValidationDetails;

use TurboSMTP\APIExtensions\EmailValidatorAPIExtension;

use TurboSMTP\Helpers\DateTimeHelper;

class EmailValidator extends TurboSMTPService {

    public function __construct(
        TurboSMTPClientConfiguration $tsClientConfiguration, 
        Configuration $configuration) 
    {
        parent::__construct($tsClientConfiguration);
        $this->api = new EmailValidatorAPIExtension($this->getClient(), $configuration);
    }


    public function GetEmailValidatorSubscriptionAsync() : PromiseInterface{
        
        $promise = $this->api->getEmailValidationSubscriptionAsync();
        
        return $promise->then(
            function (InvokerEmailValidatorSubscription $response){
                return new DomainEmailValidatorSubscription(
                    (string)$response->getCurrency(),
                    $response->getFreeCredits(),
                    $response->getFreeCreditsUsed(),
                    DateTimeHelper::fromTSDatetimes($response->getLastUsedPeriod()),
                    DateTimeHelper::fromTSDatetimes($response->getLatestPeriodStartDate()),
                    DateTimeHelper::fromTSDatetimes($response->getPeriodExpirationDate()),
                    $response->getPaidCredits(),
                    $response->getRemainingFreeCredit()
                );
            },
            function ($exception) 
            {
                $this->handle_exception($exception,"Retrieve Email Validator Subscription Information");
            }
        );             
    }
    
    public function ValidateEmailAdressAsync(String $emailAddress): PromiseInterface{
        $body = new EmailAddressRequestBody();
        $body->setEmail($emailAddress);

        $promise = $this->api->validateEmailAsync($body);
        
        return $promise->then(
            function (EmailValidatorMailDetails $response){
                return new EmailAddressValidationDetails(
                    $response->getEmail(),
                    EmailAddressValidationStatus::fromString($response->getStatus()),
                    EmailAddressValidationSubStatus::fromString($response->getSubStatus()),
                    $response->getFreeEmail(),
                    $response->getDomain(),
                    $response->getDomainAgeDays(),
                    $response->getSmtpProvider(),
                    $response->getMxFound(),
                    $response->getMxRecord(),
                    0
                );
            },
            function ($exception) 
            {
                $this->handle_exception($exception,"Validate Email Address");
            }
        );
    }
}