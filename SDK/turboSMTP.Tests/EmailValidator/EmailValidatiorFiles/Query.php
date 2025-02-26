<?php

namespace TurboSMTPTests\EmailValidator\EmailValidatiorFiles;

use DateTime;
use TurboSMTP\TurboSMTPClient;
use TurboSMTPTests\BaseTestCase;
use TurboSMTP\Model\Relays\RelaysQueryOptionsBuilder;
use TurboSMTP\Model\EmailValidator\EmailValidatorFilesQueryOptionsBuilder;
use TurboSMTP\Model\Shared\PagedListResults;
use TurboSMTP\Model\Relays\RelayFilterCriteria;
use TurboSMTP\Domain\RelayStatus;


class Query extends BaseTestCase
{
    public function test_query_with_default_params()
    {
         //Arrange
         $ts_client = new TurboSMTPClient($this->configuration);
         
         $queryOptionsBuilder = new EmailValidatorFilesQueryOptionsBuilder();

         $queryOptions = $queryOptionsBuilder
            ->setFrom((new DateTime())->modify('-3 years'))
            ->setTo(new DateTime())
            ->build();

        //Act
        $result = $ts_client->getEmailValidatorFiles()->queryAsync($queryOptions)->wait();

        //Assert
        $this->assertInstanceOf(PagedListResults::class, $result);
        $this->assertLessThanOrEqual(10, count($result->getRecords()));   
    }

     public function test_query_whith_limit()
     {
           //Arrange
           $ts_client = new TurboSMTPClient($this->configuration);
         
           $queryOptionsBuilder = new EmailValidatorFilesQueryOptionsBuilder();
 
           $queryOptions = $queryOptionsBuilder
              ->setFrom((new DateTime())->modify('-3 years'))
              ->setTo(new DateTime())
              ->setLimit(5)
              ->build();
 
          //Act
          $result = $ts_client->getEmailValidatorFiles()->queryAsync($queryOptions)->wait();
 
          //Assert
          $this->assertInstanceOf(PagedListResults::class, $result);
          $this->assertLessThanOrEqual($queryOptions->getLimit(), count($result->getRecords()));          
     }
}