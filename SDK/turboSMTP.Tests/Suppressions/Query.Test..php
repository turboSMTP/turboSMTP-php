<?php

namespace TurboSMTPTests\Suppressions;

use DateTime;

use TurboSMTPTests\BaseTestCase;

use TurboSMTP\TurboSMTPClient;

use TurboSMTP\Domain\Suppressions\Suppression;
use TurboSMTP\Domain\Suppressions\SuppresionsRestrictionFilterBy;

use TurboSMTP\Model\Suppressions\SuppressionsRestriction;
use TurboSMTP\Model\Suppressions\SuppressionsRestrictionOperator;
use TurboSMTP\Model\Suppressions\SuppressionsQueryOptionsBuilder;
use TurboSMTP\Model\Shared\PagedListResults;

class Query extends BaseTestCase
{
    public function test_Query_Suppressions_With_Default_Params()
    {
         //Arrange
         $ts_client = new TurboSMTPClient($this->configuration);
         
         $queryOptionsBuilder = new SuppressionsQueryOptionsBuilder();

         $queryOptions = $queryOptionsBuilder
            ->setFrom((new DateTime())->modify('-3 years'))
            ->setTo(new DateTime())
            ->build();

        //Act
        $result = $ts_client->getSuppressions()->queryAsync($queryOptions)->wait();

        //Assert
        $this->assertInstanceOf(PagedListResults::class, $result);
        $this->assertLessThanOrEqual(10, count($result->getRecords()));         
    }
    
    public function test_Query_Suppressions_Whith_Limit()
    {
         //Arrange
         $ts_client = new TurboSMTPClient($this->configuration);
         
         $queryOptionsBuilder = new SuppressionsQueryOptionsBuilder();

         $queryOptions = $queryOptionsBuilder
            ->setFrom((new DateTime())->modify('-3 years'))
            ->setTo(new DateTime())
            ->setLimit(5)
            ->build();

        //Act
        $result = $ts_client->getSuppressions()->queryAsync($queryOptions)->wait();

        //Assert
        $this->assertInstanceOf(PagedListResults::class, $result);
        $this->assertLessThanOrEqual(5, count($result->getRecords()));          
    }

    public function test_Query_Suppressions_Where_Subject_Contains()
    {
          //Arrange
          $ts_client = new TurboSMTPClient($this->configuration);
         
          $querysRestrictions[] = new SuppressionsRestriction(
            SuppresionsRestrictionFilterBy::subject,
            SuppressionsRestrictionOperator::include,
            'Time',
            true // Smart search enabled
          );

          $queryOptionsBuilder = new SuppressionsQueryOptionsBuilder();
 
          $queryOptions = $queryOptionsBuilder
             ->setFrom((new DateTime())->modify('-3 years'))
             ->setTo(new DateTime())
             ->setLimit(1000)
             ->setRestrictions($querysRestrictions)
             ->build();
 
         //Act
         $result = $ts_client->getSuppressions()->queryAsync($queryOptions)->wait();
 
         //Assert
         $this->assertInstanceOf(PagedListResults::class, $result);
         $records = $result->getRecords();

         foreach ($records as $suppression) {
            // Make sure we are dealing with an instance of Suppression
            $this->assertInstanceOf(Suppression::class, $suppression);
            
            // Assert that the subject contains the word "team"
            $this->assertStringContainsString('Time', $suppression->getSubject(), 
                sprintf('The subject "%s" does not contain "Time".', $suppression->getSubject())
            );
        }         
    }
}