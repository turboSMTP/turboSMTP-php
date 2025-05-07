<?php

namespace TurboSMTP\Services;

use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Promise\PromiseInterface;

use API_TurboSMTP_Invoker\Configuration;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\EmailValidationUploadResponse;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\EmailValidatorListDeleteSuccess;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\EmailValidatorList;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\EmailValidatorSucessResponsetBody;

use TurboSMTP\TurboSMTPClientConfiguration;
use TurboSMTP\Domain\EmailValidator\EmailValidatorFile;
use TurboSMTP\Model\EmailValidator\EmailValidatorFilesQueryOptions;
use TurboSMTP\Model\Shared\PagedListResults;


use TurboSMTP\APIExtensions\EmailValidatorAPIExtension;


class EmailValidatorFiles extends TurboSMTPService {

    public function __construct(
        TurboSMTPClientConfiguration $tsClientConfiguration, 
        Configuration $configuration) 
    {
        parent::__construct($tsClientConfiguration);
        $this->api = new EmailValidatorAPIExtension($this->getClient(), $configuration);
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

    public function queryAsync(EmailValidatorFilesQueryOptions $queryOptions): PromiseInterface
    {
        $timeZone = $this->getConfiguration()->timeZone;

        $promise = $this->api->getEmailValidationListsAsync(
            $queryOptions->getFrom()->format('Y-m-d'),
            $queryOptions->getTo()->format('Y-m-d'),
            $queryOptions->getPage(),
            $queryOptions->getLimit(),
            $timeZone
        );

        return $promise->then(
            function (EmailValidatorSucessResponsetBody $response){
                $records = array_map(function (EmailValidatorList $r) {
                    return new EmailValidatorFile(
                        $r->getId(),
                        $r->getCreationTime(),
                        $r->getFileName(),
                        $r->getIsProcessed(),
                        $r->getPercentage(),
                        $r->getTotalEmails(),
                        $r->getTotalProcessed()
                    );
                }, $response->getResults());

                return new PagedListResults($response->getCount(),$records);
            },
            function ($exception) 
            {
                $this->handle_exception($exception,'query email validation lists');
            }
        );        
    }

    public function getAsync(int $id): PromiseInterface   
    {
        $promise = $this->api->GetEmailValidationListSummaryAsync($id);

        return $promise->then(
            function (EmailValidatorList $response){
                return new EmailValidatorFile(
                        $response->getId(),
                        $response->getCreationTime(),
                        $response->getFileName(),
                        $response->getIsProcessed(),
                        $response->getPercentage(),
                        $response->getTotalEmails(),
                        $response->getTotalProcessed()
                    );
            },
            function ($exception) 
            {
                $this->handle_exception($exception,'get email validation list');
            }
        );         
    }
    

    public function deleteAsync(int $id): PromiseInterface   
    {
        $promise = $this->api->DeleteEmailValidationListByIdAsync($id);

        return $promise->then(
            function (EmailValidatorListDeleteSuccess $response){
                return $response->getSuccess();
            },
            function ($exception) 
            {
                $this->handle_exception($exception,'delete email validation list');
            }
        );         
    } 

    public function validateAsync(int $id): PromiseInterface
    {

        $promise = $this->api->ValidateEmailValidatorListAsync($id);
    
        return $promise->then(function () use ($id) {
            return $this->checkValidationStatus($id);
        }, function ($exception) {
            $this->handle_exception($exception,'validate email validation list');
        });
    }
    
    private function checkValidationStatus(int $id): PromiseInterface
    {
        $promise = $this->api->GetValidatedEmailsByListAsync($id);
    
        return $promise->then(function ($result) use ($id) {
            return $this->waitForProcessing($result, $id);
        });
    }
    
    private function waitForProcessing($result, int $id): PromiseInterface
    {
        if ($result->getProcessed() < $result->getCount()) {
            usleep(1000000); // usleep takes microseconds
            return $this->api->GetValidatedEmailsByListAsync($id)->then(function ($newResult) use ($id) {
                return $this->waitForProcessing($newResult, $id);
            });
        }
    
        // If processed is equal or greater than count, return true
        $promise = new Promise();
        $promise->resolve(true); // Manually resolve with true
        return $promise; // Return the resolved promise
    }

}