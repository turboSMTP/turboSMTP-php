<?php

namespace TurboSMTP\Services;

use DateTime;
use TurboSMTP\TurboSMTPClientConfiguration;
use API_TurboSMTP_Invoker\Configuration;
use TurboSMTP\APIExtensions\EmailValidatorAPIExtension;
use GuzzleHttp\Promise\PromiseInterface;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\EmailValidatorSubscription as InvokerEmailValidatorSubscription;
use TurboSMTP\Domain\EmailValidatorSubscription as DomainEmailValidatorSubscription;
use API_TurboSMTP_Invoker\ApiException;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\Currency;
use PHPUnit\Event\Test\DataProviderMethodFinishedSubscriber;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\EmailValidatorMailDetails;
use TurboSMTP\Model\EmailValiator\EmailAddressValidationDetails;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\EmailAddressRequestBody;
use TurboSMTP\Domain\EmailValidator\EmailAddressValidationStatus;
use TurboSMTP\Domain\EmailValidator\EmailAddressValidationSubStatus;

class EmailValidator extends TurboSMTPService {

    public function __construct(TurboSMTPClientConfiguration $tsClientConfiguration, Configuration $configuration) {
        parent::__construct($tsClientConfiguration);
        $this->api = new EmailValidatorAPIExtension($this->client, $configuration);
    }

    private function convertToDateTime(?string $dateString): ?DateTime
    {
        // Check if the string is not null and matches the expected pattern
        if ($dateString !== null && preg_match('/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/', $dateString)) {
            try {
                return new DateTime($dateString);
            } catch (\Exception $e) {
                return null;
            }
        }
        return null;
    }


    private function mapStringToEmailValidationStatus(string $status): ?EmailAddressValidationStatus {
        return match (strtolower($status)) {
            'valid' => EmailAddressValidationStatus::Valid,
            'invalid' => EmailAddressValidationStatus::Invalid,
            'catchall' => EmailAddressValidationStatus::CatchAll,
            'unknown' => EmailAddressValidationStatus::Unknown,
            'spamtrap' => EmailAddressValidationStatus::Spamtrap,
            'abuse' => EmailAddressValidationStatus::Abuse,
            'donotmail' => EmailAddressValidationStatus::DoNotMail,
            default => null, // Return null for invalid strings
        };
    }

    private function mapStringToEmailValidationSubStatus(string $subStatus): ?EmailAddressValidationSubStatus {
        return match (strtolower($subStatus)) {
            'empty' => EmailAddressValidationSubStatus::Empty,
            'antispam system' => EmailAddressValidationSubStatus::AntispamSystem,
            'greylisted' => EmailAddressValidationSubStatus::Greylisted,
            'mail server temporary error' => EmailAddressValidationSubStatus::MailServerTemporaryError,
            'forcible disconnect' => EmailAddressValidationSubStatus::ForcibleDisconnect,
            'mail server did not respond' => EmailAddressValidationSubStatus::MailServerDidNotRespond,
            'timeout exceeded' => EmailAddressValidationSubStatus::TimeoutExceeded,
            'failed smtp connection' => EmailAddressValidationSubStatus::FailedSmtpConnection,
            'mailbox quota exceeded' => EmailAddressValidationSubStatus::MailboxQuotaExceeded,
            'exception occurred' => EmailAddressValidationSubStatus::ExceptionOccurred,
            'possible trap' => EmailAddressValidationSubStatus::PossibleTrap,
            'role based' => EmailAddressValidationSubStatus::RoleBased,
            'global suppression' => EmailAddressValidationSubStatus::GlobalSuppression,
            'mailbox not found' => EmailAddressValidationSubStatus::MailboxNotFound,
            'no dns entries' => EmailAddressValidationSubStatus::NoDnsEntries,
            'failed syntax check' => EmailAddressValidationSubStatus::FailedSyntaxCheck,
            'possible typo' => EmailAddressValidationSubStatus::PossibleTypo,
            'unroutable ip address' => EmailAddressValidationSubStatus::UnroutableIpAddress,
            'leading period removed' => EmailAddressValidationSubStatus::LeadingPeriodRemoved,
            'does not accept mail' => EmailAddressValidationSubStatus::DoesNotAcceptMail,
            'alias address' => EmailAddressValidationSubStatus::AliasAddress,
            'role based catchall' => EmailAddressValidationSubStatus::RoleBasedCatchAll,
            'disposable' => EmailAddressValidationSubStatus::Disposable,
            'toxic' => EmailAddressValidationSubStatus::Toxic,
            default => null, // Return null for invalid strings
        };
    }

    function mapCurrencyToString(string $currency): ?string {
        switch ($currency) {
            case Currency::Dollar:
                return '$'; // Return the symbol for Dollar
            case Currency::Euro:
                return '€'; // Return the symbol for Euro
            case Currency::Pound:
                return '£'; // Return the symbol for Pound
            default:
                return null; // Return null for invalid Currency constants
        }
    }

    public function GetEmailValidatorSubscriptionAsync() : PromiseInterface{
        $promise = $this->api->getEmailValidationSubscriptionAsync();
        return $promise->then(
            function (InvokerEmailValidatorSubscription $response){
                return new DomainEmailValidatorSubscription(
                    $this->mapCurrencyToString($response->getCurrency()),
                    $response->getFreeCredits(),
                    $response->getFreeCreditsUsed(),
                    $this->convertToDateTime($response->getLastUsedPeriod()),
                    $this->convertToDateTime($response->getLatestPeriodStartDate()),
                    $this->convertToDateTime($response->getPeriodExpirationDate()),
                    $response->getPaidCredits(),
                    $response->getRemainingFreeCredit()
                );
            },
            function ($exception) 
            {
                if ($exception instanceof APIException && $exception->getCode() === 400) {
                    $responseBody = $exception->getResponseBody();
        
                    $responseArray = json_decode($responseBody, true);
        
                    if (json_last_error() === JSON_ERROR_NONE && isset($responseArray['message'])) {
                        $message = $responseArray['message'];
        
                        throw new \Exception($message);
                    } else {
                        throw new \Exception('Failed to retrieve Email Validator subscription information: ' . $exception->getMessage());
                    }
                }
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
                    $this->mapStringToEmailValidationStatus($response->getStatus()),
                    $this->mapStringToEmailValidationSubStatus($response->getSubStatus()),
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
                if ($exception instanceof APIException && $exception->getCode() === 400) {
                    $responseBody = $exception->getResponseBody();
        
                    $responseArray = json_decode($responseBody, true);
        
                    if (json_last_error() === JSON_ERROR_NONE && isset($responseArray['message'])) {
                        $message = $responseArray['message'];
        
                        throw new \Exception($message);
                    } else {
                        throw new \Exception('Failed to validate email address: ' . $exception->getMessage());
                    }
                }
            }
        );
    }
}