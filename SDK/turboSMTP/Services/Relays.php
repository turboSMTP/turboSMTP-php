<?php

namespace TurboSMTP\Services;

use API_TurboSMTP_Invoker\API_TurboSMTP_Model\AnalyticsListSucessResponsetBody;
use API_TurboSMTP_Invoker\Configuration;
use TurboSMTP\APIExtensions\AnalyticsAPIExtension;
use TurboSMTP\Model\Relays\RelaysQueryOptions;
use TurboSMTP\Model\Shared\PagedListResults;
use TurboSMTP\TurboSMTPClientConfiguration;
use TurboSMTP\Domain\Relay;
use API_TurboSMTP_Invoker\ApiException;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\AnalyticMailItem;
use GuzzleHttp\Promise\PromiseInterface;
use TurboSMTP\Domain\RelayStatus;

class Relays extends TurboSMTPService {

    public function __construct(TurboSMTPClientConfiguration $tsClientConfiguration, Configuration $configuration) {
        parent::__construct($tsClientConfiguration);
        $this->api = new AnalyticsAPIExtension($this->client, $configuration);
    }

    private function mapAnalyticMailStatusToRelayStatus(?string $status): ?RelayStatus
    {
        if ($status === null) {
            return null; // handle null case
        }
    
        switch ($status) {
            case 'NEW':
                return RelayStatus::NEW;
            case 'DEFER':
                return RelayStatus::DEFER;
            case 'SUCCESS':
                return RelayStatus::SUCCESS;
            case 'OPEN':
                return RelayStatus::OPEN;
            case 'CLICK':
                return RelayStatus::CLICK;
            case 'REPORT':
                return RelayStatus::REPORT;
            case 'FAIL':
                return RelayStatus::FAIL;
            case 'SYSFAIL':
                return RelayStatus::SYSFAIL;
            case 'UNSUB':
                return RelayStatus::UNSUB;
            default:
                return null; // or throw an exception if needed
        }
    }   

    public function queryAsync(RelaysQueryOptions $queryOptions) : PromiseInterface
    {
        $timeZone = $this->configuration->timeZone;

        $filterByStrings = array_map(function($criteria) {
            return $criteria->name; 
        }, $queryOptions->getFilterBy());   
        
        $statusesStrings = array_map(function($criteria) {
            return $criteria->name; 
        }, $queryOptions->getRelayStatuses());  

        $promise = $this->api->getAnalyticsDataAsync(
            $queryOptions->getFrom()->format('Y-m-d'),
            $queryOptions->getTo()->format('Y-m-d'),
            $queryOptions->getPage(),
            $queryOptions->getLimit(),
            $statusesStrings,
            $filterByStrings,
            $queryOptions->getFilter(),
            $queryOptions->getSmartSearch(),
            $queryOptions->getOrderby()->name,
            $queryOptions->getOrdertype()->name,
            //$timezone //TODO;
        );

        return $promise->then(
            function (AnalyticsListSucessResponsetBody $response){
                $records = array_map(function (AnalyticMailItem $r) {
                    return new Relay(
                        $r->getId(),
                        $r->getSubject(),
                        $r->getSender(),
                        $r->getRecipient(),
                        $r->getSendTime(),
                        $this->mapAnalyticMailStatusToRelayStatus($r->getStatus()),
                        $r->getDomain(),
                        $r->getContactDomain(),
                        $r->getError(),
                        $r->getXCampaignId()
                    );
                }, $response->getResults());

                return new PagedListResults($response->getCount(),$records);
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
                        throw new \Exception('Failed to send email: ' . $exception->getMessage());
                    }
                }
            }
        );        
    }

}
