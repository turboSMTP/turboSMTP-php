<?php

namespace TurboSMTP\Services;

use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Promise\RejectedPromise;

use API_TurboSMTP_Invoker\Configuration;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionOrderBy;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionRestrictBy;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionFilterOrderPageRequestBody;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionOperator;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionRestriction;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionFilterRequestBody;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionsDeleteSuccess;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionUploadResponse;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionImportJson;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionsSucessResponsetBody;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\Suppression;


use TurboSMTP\Model\Shared\PagedListResults;

use TurboSMTP\TurboSMTPClientConfiguration;
use TurboSMTP\Domain\Suppressions\Suppression as SuppressionDomain;
use TurboSMTP\Domain\Suppressions\SuppressionSource as SuppressionSourceDomain;
use TurboSMTP\Domain\Suppressions\SuppresionsRestrictionFilterBy;
use TurboSMTP\Model\Suppressions\SuppressionsOrderBy as SuppressionsOrderByModel;
use TurboSMTP\Model\Suppressions\SuppressionsQueryOptions;
use TurboSMTP\Model\Suppressions\SuppressionsRestriction;
use TurboSMTP\Model\Suppressions\SuppressionsRestrictionOperator;
use TurboSMTP\Model\Suppressions\SuppressionsDeleteOptions;
use TurboSMTP\Model\Suppressions\SuppressionsAddResult;
use TurboSMTP\Model\Suppressions\SuppressionsExportOptions;


use TurboSMTP\APIExtensions\SuppressionsAPIExtension;

use TurboSMTP\Helpers\DateTimeHelper;

class Suppressions extends TurboSMTPService {

    public function __construct(
        TurboSMTPClientConfiguration $tsClientConfiguration, 
        Configuration $configuration
        ) 
    {
        parent::__construct($tsClientConfiguration);
        $this->api = new SuppressionsAPIExtension($this->getClient(), $configuration);
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
    
    private function filterByStrings(array $filterBy): array
    {
        return array_column($filterBy, 'name');
    }

    private function restrictions(array $restrictions): array
    {
        return array_map(function(SuppressionsRestriction $criteria) {
            $t = new SuppressionRestriction();
        
            // Map the enum value to the string constant for 'by'
            $byMapping = [
                SuppresionsRestrictionFilterBy::sender->value => SuppressionRestrictBy::SENDER,
                SuppresionsRestrictionFilterBy::recipient->value => SuppressionRestrictBy::RECIPIENT,
                SuppresionsRestrictionFilterBy::reason->value => SuppressionRestrictBy::REASON,
                SuppresionsRestrictionFilterBy::subject->value => SuppressionRestrictBy::SUBJECT,
            ];
        
            $t->setBy($byMapping[$criteria->getBy()->value]);
        
            // Map the enum value for 'operator'
            $operatorMapping = [
                SuppressionsRestrictionOperator::include->value => SuppressionOperator::_INCLUDE,
                SuppressionsRestrictionOperator::exclude->value => SuppressionOperator::EXCLUDE,
            ];
        
            $t->setOperator($operatorMapping[$criteria->getOperator()->value]);
        
            // Set other properties
            $t->setFilter($criteria->getFilter());
            $t->setSmartSearch($criteria->getSmartSearch());
        
            return $t;
        }, $restrictions);     
    }

    public function deleteWithOptionsAsync(SuppressionsDeleteOptions $options): PromiseInterface
    {
        $suppressionFilterRequestBody = new SuppressionFilterRequestBody();
        $suppressionFilterRequestBody->setFrom($options->getFrom());
        $suppressionFilterRequestBody->setTo($options->getTo());
        $suppressionFilterRequestBody->setFilter($options->getFilter());

        $filterByStrings = $this->filterByStrings($options->getFilterBy());
        $filterByStrings && $suppressionFilterRequestBody->setFilterBy($filterByStrings);

        $suppressionFilterRequestBody->setSmartSearch($options->getSmartSearch());

        $suppressionFilterRequestBody->setRestrict($this->restrictions($options->getRestrictions()));

        return $this->api->deleteFilterSuppressionsAsync($suppressionFilterRequestBody)->then(
            function (SuppressionsDeleteSuccess $response) {
                return $response->getSuccess();
            },
            function ($exception) {
                $this->handle_exception($exception, 'delete suppressions with options');
            }
        );
    }

    private function setOrderByFromSuppressionsOrderBy(SuppressionsOrderByModel $orderBy): string {
        $orderByMapping = [
            SuppressionsOrderByModel::date => SuppressionOrderBy::DATE,
            SuppressionsOrderByModel::source => SuppressionOrderBy::SOURCE,
            SuppressionsOrderByModel::recipient => SuppressionOrderBy::RECIPIENT,
            SuppressionsOrderByModel::reason => SuppressionOrderBy::REASON,
        ];
    
        if (!array_key_exists($orderBy, $orderByMapping)) {
            throw new \InvalidArgumentException("Invalid SuppressionsOrderBy value");
        }
    
        return $orderByMapping[$orderBy];
    }

    public function queryAsync(SuppressionsQueryOptions $options): PromiseInterface
    {
        $suppressionFilterRequestBody = new SuppressionFilterOrderPageRequestBody();
        $suppressionFilterRequestBody->setFrom($options->getFrom());
        $suppressionFilterRequestBody->setTo($options->getTo());
        $suppressionFilterRequestBody->setFilter($options->getFilter());

        $filterByStrings = $this->filterByStrings($options->getFilterBy());
        $filterByStrings && $suppressionFilterRequestBody->setFilterBy($filterByStrings);

        $suppressionFilterRequestBody->setSmartSearch($options->getSmartSearch());

        $suppressionFilterRequestBody->setRestrict($this->restrictions($options->getRestrictions()));

        $suppressionFilterRequestBody->setPage($options->getPage());
        $suppressionFilterRequestBody->setLimit($options->getLimit());
        $suppressionFilterRequestBody->setOrderby($this->setOrderByFromSuppressionsOrderBy($options->getOrderBy()));

        return $this->api->filterSuppressionsAsync($suppressionFilterRequestBody)->then(
            function (SuppressionsSucessResponsetBody $response) {
                $records = array_map(function (Suppression $r) {
                    return new SuppressionDomain
                    (
                        DateTimeHelper::fromTSDatetimes($r->getDate()),
                        $r->getSender(),
                        SuppressionSourceDomain::fromString((string)$r->getSource()),
                        $r->getSubject(),
                        $r->getRecipient(),
                        $r->getReason()
                    );
                }, $response->getResults());

                return new PagedListResults($response->getCount(),$records);
            },
            function ($exception) {
                $this->handle_exception($exception, 'query suppressions');
            }
        );
        
    }

    public function exportAsync(SuppressionsExportOptions $options): PromiseInterface
    {
        $suppressionFilterRequestBody = new SuppressionFilterOrderPageRequestBody();
        $suppressionFilterRequestBody->setFrom($options->getFrom());
        $suppressionFilterRequestBody->setTo($options->getTo());
        $suppressionFilterRequestBody->setFilter($options->getFilter());

        $filterByStrings = $this->filterByStrings($options->getFilterBy());
        $filterByStrings && $suppressionFilterRequestBody->setFilterBy($filterByStrings);

        $suppressionFilterRequestBody->setSmartSearch($options->getSmartSearch());

        $suppressionFilterRequestBody->setRestrict($this->restrictions($options->getRestrictions()));
        $suppressionFilterRequestBody->setOrderby($this->setOrderByFromSuppressionsOrderBy($options->getOrderBy()));

        return $this->api->exportFilterSuppressionsAsync($suppressionFilterRequestBody)->then(
            function (string $response) {
                return $response;
            },
            function ($exception) {
                $this->handle_exception($exception, 'export suppressions');
            }
        );
 
    }
}