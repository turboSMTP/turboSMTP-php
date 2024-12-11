<?php

namespace TurboSMTPTests\Relays;

use DateTime;
use TurboSMTP\TurboSMTPClient;
use TurboSMTPTests\BaseTestCase;
use TurboSMTP\Model\Relays\RelaysQueryOptionsBuilder;
use TurboSMTP\Model\Shared\PagedListResults;
use TurboSMTP\Model\Relays\RelayFilterCriteria;
use TurboSMTP\Domain\RelayStatus;

class Query extends BaseTestCase
{
    public function test_query_with_default_params()
    {
         //Arrange
         $ts_client = new TurboSMTPClient($this->configuration);
         
         $queryOptionsBuilder = new RelaysQueryOptionsBuilder();

         $queryOptions = $queryOptionsBuilder
            ->setFrom((new DateTime())->modify('-3 years'))
            ->setTo(new DateTime())
            ->build();

        //Act
        $result = $ts_client->getRelays()->queryAsync($queryOptions)->wait();

        //Assert
        $this->assertInstanceOf(PagedListResults::class, $result);
        $this->assertLessThanOrEqual(10, count($result->getRecords()));   
    }

    public function test_query_whith_limit()
    {
          //Arrange
          $ts_client = new TurboSMTPClient($this->configuration);
         
          $queryOptionsBuilder = new RelaysQueryOptionsBuilder();
 
          $queryOptions = $queryOptionsBuilder
             ->setFrom((new DateTime())->modify('-3 years'))
             ->setTo(new DateTime())
             ->setLimit(5)
             ->build();
 
         //Act
         $result = $ts_client->getRelays()->queryAsync($queryOptions)->wait();
 
         //Assert
         $this->assertInstanceOf(PagedListResults::class, $result);
         $this->assertLessThanOrEqual($queryOptions->getLimit(), count($result->getRecords()));          
    }

    public function test_query_filtered_by_subject()
    {
          //Arrange
          $ts_client = new TurboSMTPClient($this->configuration);
         
          $queryOptionsBuilder = new RelaysQueryOptionsBuilder();
 
          $queryOptions = $queryOptionsBuilder
             ->setFrom((new DateTime())->modify('-3 years'))
             ->setTo(new DateTime())
             ->setLimit(1000)
             ->setFilterBy([RelayFilterCriteria::subject])
             ->setFilter('team')
             ->build();
 
         //Act
         $result = $ts_client->getRelays()->queryAsync($queryOptions)->wait();
 
         //Assert
         $this->assertInstanceOf(PagedListResults::class, $result);

         foreach ($result->getRecords() as $record) {
            $this->assertStringContainsString($queryOptions->getFilter(), $record->getSubject());
        }         
    }    

    public function test_query_filtered_by_status()
    {
          //Arrange
          $ts_client = new TurboSMTPClient($this->configuration);
         
          $queryOptionsBuilder = new RelaysQueryOptionsBuilder();

          $deliveredRelayStatuses = [
            RelayStatus::SUCCESS,
            RelayStatus::OPEN,
            RelayStatus::CLICK,
            RelayStatus::UNSUB,
            RelayStatus::REPORT
        ];          
 
          $queryOptions = $queryOptionsBuilder
             ->setFrom((new DateTime())->modify('-3 years'))
             ->setTo(new DateTime())
             ->setLimit(1000)
             ->setRelayStatuses($deliveredRelayStatuses)
             ->build();
 
         //Act
         $result = $ts_client->getRelays()->queryAsync($queryOptions)->wait();
 
         //Assert
         $this->assertInstanceOf(PagedListResults::class, $result);

         foreach ($result->getRecords() as $record) {
            $this->assertContains($record->getStatus()->value, array_map(fn($status) => $status->value, $deliveredRelayStatuses));
        }         
    }      
}