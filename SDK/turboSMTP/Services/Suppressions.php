<?php

namespace TurboSMTP\Services;

use TurboSMTP\Domain\Suppressions\SuppressionSource as SuppressionSourceDomain;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionSource;
use TurboSMTP\Domain\Suppressions\Suppression as SuppressionDomain;
use TurboSMTP\Model\Suppressions\SuppressionsOrderBy as SuppressionsOrderByModel;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionOrderBy;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionFilterOrderPageRequestBody;
use TurboSMTP\Model\Suppressions\SuppressionsQueryOptions;
use TurboSMTP\Model\Suppressions\SuppressionsRestriction;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionOperator;
use TurboSMTP\Model\Suppressions\SuppressionsRestrictionOperator;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionRestrictBy;
use TurboSMTP\Domain\Suppressions\SuppresionsRestrictionFilterBy;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionRestriction;
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
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionsSucessResponsetBody;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\Suppression;
use TurboSMTP\Domain\Suppressions\Suppression as SuppressionsSuppression;
use TurboSMTP\Model\Suppressions\SuppressionsExportOptions;

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

        $restrictTransformed = array_map(function(SuppressionsRestriction $criteria) {
            $t = new SuppressionRestriction();
            // Map the enum value to the string constant
            switch ($criteria->getBy()->value) {
                case SuppresionsRestrictionFilterBy::sender->value:
                    $t->setBy(SuppressionRestrictBy::SENDER);
                    break;
                case SuppresionsRestrictionFilterBy::recipient->value:
                    $t->setBy(SuppressionRestrictBy::RECIPIENT);
                    break;
                case SuppresionsRestrictionFilterBy::reason->value:
                    $t->setBy(SuppressionRestrictBy::REASON);
                    break;
                case SuppresionsRestrictionFilterBy::subject->value:
                    $t->setBy(SuppressionRestrictBy::SUBJECT);
                    break;
                default:
                    throw new \InvalidArgumentException('Invalid suppression restriction filter by value');
            }

            // Map the enum value for 'operator' property
            switch ($criteria->getOperator()->value) {
                case SuppressionsRestrictionOperator::include->value:
                    $t->setOperator(SuppressionOperator::_INCLUDE);
                    break;
                case SuppressionsRestrictionOperator::exclude->value:
                    $t->setOperator(SuppressionOperator::EXCLUDE);
                    break;
                default:
                    throw new \InvalidArgumentException('Invalid suppression restriction operator value');
            }

            $t->setFilter($criteria->getFilter());
            $t->setSmartSearch(($criteria->getSmartSearch()));

            return $t;
        }, $options->getRestrictions());      
        
        $suppressionFilterRequestBody->setRestrict($restrictTransformed);

        return $this->api->deleteFilterSuppressionsAsync($suppressionFilterRequestBody)->then(
            function (SuppressionsDeleteSuccess $response) {
                return $response->getSuccess();
            },
            function ($exception) {
                $this->handle_exception($exception, 'delete suppressions with options');
            }
        );
    }

    private function setOrderByFromSuppressionsOrderBy(SuppressionsOrderByModel $orderBy): string{//SuppressionOrderBy {
        switch ($orderBy) {
            case SuppressionsOrderByModel::date:
                return SuppressionOrderBy::DATE; // This is already correct
            case SuppressionsOrderByModel::source:
                return SuppressionOrderBy::SOURCE; // This is already correct
            case SuppressionsOrderByModel::recipient:
                return SuppressionOrderBy::RECIPIENT; // This is already correct
            case SuppressionsOrderByModel::reason:
                return SuppressionOrderBy::REASON; // This is already correct
            default:
                throw new \InvalidArgumentException("Invalid SuppressionsOrderBy value");
        }
    }

    private function StringSuppressionSource2DomainSuppressionSource(string $suppressionSource): SuppressionSourceDomain{
        switch($suppressionSource){
            case "bounce":
                return SuppressionSourceDomain::bounce;
            case "manual":
                return SuppressionSourceDomain::manual;
            case "spam":
                return SuppressionSourceDomain::spam;
            case "unsubscribe":
                return SuppressionSourceDomain::unsubscribe;
            case "validation_failed":
                return SuppressionSourceDomain::validationfailed;
            default:
                throw new \InvalidArgumentException("Invalid SuppressionSource value");
        }
    }

    public function queryAsync(SuppressionsQueryOptions $options): PromiseInterface
    {
        $suppressionFilterRequestBody = new SuppressionFilterOrderPageRequestBody();
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

        $restrictTransformed = array_map(function(SuppressionsRestriction $criteria) {
            $t = new SuppressionRestriction();
            // Map the enum value to the string constant
            switch ($criteria->getBy()->value) {
                case SuppresionsRestrictionFilterBy::sender->value:
                    $t->setBy(SuppressionRestrictBy::SENDER);
                    break;
                case SuppresionsRestrictionFilterBy::recipient->value:
                    $t->setBy(SuppressionRestrictBy::RECIPIENT);
                    break;
                case SuppresionsRestrictionFilterBy::reason->value:
                    $t->setBy(SuppressionRestrictBy::REASON);
                    break;
                case SuppresionsRestrictionFilterBy::subject->value:
                    $t->setBy(SuppressionRestrictBy::SUBJECT);
                    break;
                default:
                    throw new \InvalidArgumentException('Invalid suppression restriction filter by value');
            }

            // Map the enum value for 'operator' property
            switch ($criteria->getOperator()->value) {
                case SuppressionsRestrictionOperator::include->value:
                    $t->setOperator(SuppressionOperator::_INCLUDE);
                    break;
                case SuppressionsRestrictionOperator::exclude->value:
                    $t->setOperator(SuppressionOperator::EXCLUDE);
                    break;
                default:
                    throw new \InvalidArgumentException('Invalid suppression restriction operator value');
            }

            $t->setFilter($criteria->getFilter());
            $t->setSmartSearch(($criteria->getSmartSearch()));

            return $t;
        }, $options->getRestrictions());      
        
        $suppressionFilterRequestBody->setRestrict($restrictTransformed);
        $suppressionFilterRequestBody->setPage($options->getPage());
        $suppressionFilterRequestBody->setLimit($options->getLimit());
        $suppressionFilterRequestBody->setOrderby($this->setOrderByFromSuppressionsOrderBy($options->getOrderBy()));

        return $this->api->filterSuppressionsAsync($suppressionFilterRequestBody)->then(
            function (SuppressionsSucessResponsetBody $response) {
                $records = array_map(function (Suppression $r) {
                    return new SuppressionDomain
                    (
                        \DateTime::createFromFormat('Y-m-d H:i:s', $r->getDate()),
                        $r->getSender(),
                        $this->StringSuppressionSource2DomainSuppressionSource((string)$r->getSource()),
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

        $filterByStrings = array_map(function($criteria) {
            return $criteria->name; 
        }, $options->getFilterBy());

        if (!empty($filterByStrings)) {
            $suppressionFilterRequestBody->setFilterBy($filterByStrings);
        }

        $suppressionFilterRequestBody->setSmartSearch($options->getSmartSearch());

        $restrictTransformed = array_map(function(SuppressionsRestriction $criteria) {
            $t = new SuppressionRestriction();
            // Map the enum value to the string constant
            switch ($criteria->getBy()->value) {
                case SuppresionsRestrictionFilterBy::sender->value:
                    $t->setBy(SuppressionRestrictBy::SENDER);
                    break;
                case SuppresionsRestrictionFilterBy::recipient->value:
                    $t->setBy(SuppressionRestrictBy::RECIPIENT);
                    break;
                case SuppresionsRestrictionFilterBy::reason->value:
                    $t->setBy(SuppressionRestrictBy::REASON);
                    break;
                case SuppresionsRestrictionFilterBy::subject->value:
                    $t->setBy(SuppressionRestrictBy::SUBJECT);
                    break;
                default:
                    throw new \InvalidArgumentException('Invalid suppression restriction filter by value');
            }

            // Map the enum value for 'operator' property
            switch ($criteria->getOperator()->value) {
                case SuppressionsRestrictionOperator::include->value:
                    $t->setOperator(SuppressionOperator::_INCLUDE);
                    break;
                case SuppressionsRestrictionOperator::exclude->value:
                    $t->setOperator(SuppressionOperator::EXCLUDE);
                    break;
                default:
                    throw new \InvalidArgumentException('Invalid suppression restriction operator value');
            }

            $t->setFilter($criteria->getFilter());
            $t->setSmartSearch(($criteria->getSmartSearch()));

            return $t;
        }, $options->getRestrictions());      
        
        $suppressionFilterRequestBody->setRestrict($restrictTransformed);
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