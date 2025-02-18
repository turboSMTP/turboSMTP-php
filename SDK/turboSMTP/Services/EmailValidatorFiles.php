<?php

namespace TurboSMTP\Services;

use DateTime;
use TurboSMTP\TurboSMTPClientConfiguration;
use API_TurboSMTP_Invoker\Configuration;
use TurboSMTP\APIExtensions\EmailValidatorAPIExtension;
use GuzzleHttp\Promise\PromiseInterface;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\EmailValidationUploadResponse;
use TurboSMTP\Domain\EmailValidatorSubscription as DomainEmailValidatorSubscription;
use API_TurboSMTP_Invoker\ApiException;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\Currency;
use PHPUnit\Event\Test\DataProviderMethodFinishedSubscriber;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\EmailValidatorMailDetails;
use TurboSMTP\Model\EmailValiator\EmailAddressValidationDetails;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\EmailAddressRequestBody;
use TurboSMTP\Domain\EmailValidator\EmailAddressValidationStatus;
use TurboSMTP\Domain\EmailValidator\EmailAddressValidationSubStatus;

class EmailValidatorFiles extends TurboSMTPService {

    public function __construct(TurboSMTPClientConfiguration $tsClientConfiguration, Configuration $configuration) {
        parent::__construct($tsClientConfiguration);
        $this->api = new EmailValidatorAPIExtension($this->client, $configuration);
    }

    public function addAsync(string $filename, array $emailAddresses): PromiseInterface
    {
        if (empty($emailAddresses)) {
            throw new \InvalidArgumentException("emailAddress");
        }
        
        $tempFolderPath = sys_get_temp_dir() . '/TSSDK';
        
        // Check if the directory exists, if not create it
        if (!is_dir($tempFolderPath)) {
            mkdir($tempFolderPath, 0777, true);
        }
        
        $filePath = $tempFolderPath . '/' . $filename;

        // Write email addresses to the file
        file_put_contents($filePath, implode(PHP_EOL, $emailAddresses));
        
        $promise = $this->api->UploadEmailValidationFileAsync($filePath);  //getEmailValidationSubscriptionAsync();

        return $promise->then(
            function (EmailValidationUploadResponse $response) use ($filePath) {
                        // Handle successful response
                        unlink($filePath); // Delete the file
                        return $response->getListId();
            },
            function ($exception) 
            {
                $this->handle_exception($exception,'upload email validator file');
            }
        ); 
    }

}