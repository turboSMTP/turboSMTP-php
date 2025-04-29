<?php

namespace TurboSMTP\Services;

use GuzzleHttp\Promise\PromiseInterface;

use API_TurboSMTP_Invoker\Configuration;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\AnalyticsListSucessResponsetBody;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\AnalyticMailItem;

use TurboSMTP\Model\Shared\PagedListResults;

use TurboSMTP\TurboSMTPClientConfiguration;
use TurboSMTP\Domain\Relays\Relay;
use TurboSMTP\Domain\Relays\RelayStatus;
use TurboSMTP\Model\Relays\RelaysQueryOptions;
use TurboSMTP\Model\Relays\RelaysExportOptions;

use TurboSMTP\APIExtensions\RelaysAPIExtension;

use TurboSMTP\Helpers\DateTimeHelper;

class Relays extends TurboSMTPService {

    public function __construct(
        TurboSMTPClientConfiguration $tsClientConfiguration, 
        Configuration $configuration) 
    {
        parent::__construct($tsClientConfiguration);
        $this->api = new RelaysAPIExtension($this->client, $configuration);
    }

    private function filterByStringsArr(array $filterBy) : array
    {
        return array_map(function($criteria) {
            return $criteria->name; 
        }, $filterBy); 
    }

    private function statusesStringsArr(array $relayStatuses): array
    {
        return array_map(function($criteria) {
            return $criteria->name; 
        }, $relayStatuses); 
    }

    public function queryAsync(RelaysQueryOptions $queryOptions) : PromiseInterface
    {
        $timeZone = $this->configuration->timeZone;

        $promise = $this->api->getAnalyticsDataAsync(
            DateTimeHelper::toShortString($queryOptions->getFrom()),
            DateTimeHelper::toShortString($queryOptions->getTo()),
            $queryOptions->getPage(),
            $queryOptions->getLimit(),
            $this->statusesStringsArr($queryOptions->getRelayStatuses()),
            $this->filterByStringsArr($queryOptions->getFilterBy()),
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
                        RelayStatus::fromString((string)$r->getStatus()),
                        $r->getDomain(),
                        $r->getRecipientDomain(),
                        $r->getError(),
                        $r->getXCampaignId()
                    );
                }, $response->getResults());

                return new PagedListResults($response->getCount(),$records);
            },
            function ($exception) 
            {
                $this->handle_exception($exception,"retrieving Relays information");
            }
        );        
    }

    public function exportAsync(RelaysExportOptions $exportOptions): PromiseInterface
    {
        $timeZone = $this->configuration->timeZone;

        $promise = $this->api->exportAnalyticsDataCSVAsync
        (
            $exportOptions->getFrom()->format('Y-m-d'),
            $exportOptions->getTo()->format('Y-m-d'),
            $this->statusesStringsArr($exportOptions->getRelayStatuses()),
            $this->filterByStringsArr($exportOptions->getFilterBy()),
            $exportOptions->getFilter(),
            $exportOptions->getSmartSearch(),
            $exportOptions->getOrderby()->name,
            $exportOptions->getOrdertype()->name,
            //$timezone //TODO;
        );        

        return $promise->then(
            function (string $response){
                return $response;
            },
            function ($exception) 
            {
                $this->handle_exception($exception,"exporting Relays information");
            }
        );        

    }
}
