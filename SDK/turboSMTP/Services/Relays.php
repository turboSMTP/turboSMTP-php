<?php

namespace TurboSMTP\Services;

//require '../vendor/autoload.php'; // Include Composer autoloader

use API_TurboSMTP_Invoker\API_TurboSMTP_Model\AnalyticsListSucessResponsetBody;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\EmailRequestBody;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\Attachment;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\SendSucessResponsetBody;
use API_TurboSMTP_Invoker\Configuration;
use TurboSMTP\APIExtensions\AnalyticsAPIExtension;
use TurboSMTP\Domain\EmailMessage;
use TurboSMTP\Model\Email\SendDetails;
use TurboSMTP\Model\Relays\RelaysQueryOptions;
use TurboSMTP\Model\Shared\PagedListResults;
use TurboSMTP\TurboSMTPClientConfiguration;
use TurboSMTP\Domain\Relay;
use API_TurboSMTP_Invoker\ApiException;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\AnalyticMailItem;
use GuzzleHttp\Promise\PromiseInterface;


class Relays extends TurboSMTPService {

    public function __construct(TurboSMTPClientConfiguration $tsClientConfiguration, Configuration $configuration) {
        parent::__construct($tsClientConfiguration);
        $this->api = new AnalyticsAPIExtension($this->client, $configuration);
    }

    public function queryAsync(RelaysQueryOptions $queryOptions) : PromiseInterface
    {
        $timeZone = $this->configuration->timeZone;

        $filterByStrings = array_map(function($criteria) {
            return $criteria->name; 
        }, $queryOptions->getFilterBy());   
        
        $promise = $this->api->getAnalyticsDataAsync(
            $queryOptions->getFrom()->format('Y-m-d'),
            $queryOptions->getTo()->format('Y-m-d'),
            $queryOptions->getPage(),
            $queryOptions->getLimit(),
            $queryOptions->getRelayStatuses(),
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
                        $r->getStatus(),
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
