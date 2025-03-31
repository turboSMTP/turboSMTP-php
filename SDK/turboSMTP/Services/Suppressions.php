<?php

namespace TurboSMTP\Services;

use TurboSMTP\Model\Suppressions\SuppressionsDeleteOptions;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionFilterRequestBody;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionsDeleteSuccess;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionUploadResponse;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionImportJson;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\AnalyticsListSucessResponsetBody;
use API_TurboSMTP_Invoker\Configuration;
use TurboSMTP\APIExtensions\SuppressionsAPIExtension;
use TurboSMTP\Model\Suppressions\SuppressionsAddResult;
use TurboSMTP\Model\Relays\RelaysQueryOptions;
use TurboSMTP\Model\Relays\RelaysExportOptions;
use TurboSMTP\Model\Shared\PagedListResults;
use TurboSMTP\TurboSMTPClientConfiguration;
use TurboSMTP\Domain\Relay;
use API_TurboSMTP_Invoker\ApiException;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\AnalyticMailItem;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Promise\RejectedPromise;
use TurboSMTP\Domain\RelayStatus;

class Suppressions extends TurboSMTPService {

    public function __construct(TurboSMTPClientConfiguration $tsClientConfiguration, Configuration $configuration) {
        parent::__construct($tsClientConfiguration);
        $this->api = new SuppressionsAPIExtension($this->client, $configuration);
    }

    public function addRangeAsync(string $reason, array $emailAddresses): PromiseInterface
    {
        $suppression_import_json = new SuppressionImportJson(null);
        $suppression_import_json->setType('manual');
        $suppression_import_json->setReason($reason);
        $suppression_import_json->setContent($emailAddresses);

        $promise = $this->api->ImportSuppressionsAsync($suppression_import_json);        

        return $promise->then(
            function (SuppressionUploadResponse $response){
                return new SuppressionsAddResult(
                    $response->getStatus(),
                    $response->getValid(),
                    $response->getInvalid()
                );
            },
            function ($exception) 
            {
                $this->handle_exception($exception,'upload email validator file');
            }
        );        
    }

    public function addAsync(string $reason, string $emailAddress): PromiseInterface
    {
        // Create an array with the single email address
        $emailAddresses = [$emailAddress];
    
        // Call the existing addRangeAsync method
        return $this->addRangeAsync($reason, $emailAddresses);
    }
    
    public function deleteRangeAsync(array $emails): PromiseInterface
    {
        if (empty($emails)) {
            return new RejectedPromise(new \InvalidArgumentException("The email list cannot be null or empty."));
        }
    
        return $this->api->BulkDeleteSuppressionsAsync($emails)->then(
            function (SuppressionsDeleteSuccess $response) {
                return $response->getSuccess();
            },
            function ($exception) {
                $this->handle_exception($exception, 'bulk delete suppressions');
            }
        );
    }
    
    public function deleteAsync(string $emailAddress): PromiseInterface
    {
        // Create an array with the single email address
        $emailAddresses = [$emailAddress];
    
        // Call the existing deleteRangeAsync method
        return $this->deleteRangeAsync($emailAddresses);
    }
    
    public function deleteWithOptionsAsync(SuppressionsDeleteOptions $options): PromiseInterface
    {
/*
'from' => 'date',
'to' => 'date',
'tz' => null,
'filter' => null,
'filter_by' => null,
'smart_search' => null,
'restrict' => null
*/

        $suppressionFilterRequestBody = new SuppressionFilterRequestBody();
        $suppressionFilterRequestBody->setFrom($options->getFrom());
        $suppressionFilterRequestBody->setTo($options->getTo());
        $suppressionFilterRequestBody->setFilter($options->getFilter());

        $filterByStrings = array_map(function($criteria) {
            return $criteria->name; 
        }, $options->getFilterBy());

        if (!empty($filterByStrings)) {
            $suppressionFilterRequestBody->setFilterBy($filterByStrings);
        }

        $suppressionFilterRequestBody->setSmartSearch($options->getSmartSearch());

        $restrictStrings = array_map(function($criteria) {
            return $criteria->name; 
        }, $options->getRestrictions());      
        
        $suppressionFilterRequestBody->setRestrict($restrictStrings);

        return $this->api->deleteFilterSuppressionsAsync($suppressionFilterRequestBody)->then(
            function (SuppressionsDeleteSuccess $response) {
                return $response->getSuccess();
            },
            function ($exception) {
                $this->handle_exception($exception, 'delete suppressions with options');
            }
        );
    }
}