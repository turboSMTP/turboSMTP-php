<?php

namespace TurboSMTPTests\Suppressions;

use DateTime;

use TurboSMTPTests\BaseTestCase;

use TurboSMTP\TurboSMTPClient;

use TurboSMTP\Domain\Suppressions\SuppresionsRestrictionFilterBy;

use TurboSMTP\Model\Suppressions\SuppressionsExportOptionsBuilder;
use TurboSMTP\Model\Suppressions\SuppressionsRestriction;
use TurboSMTP\Model\Suppressions\SuppressionsRestrictionOperator;

class Export extends BaseTestCase
{
    public function test_Export_Suppressions_With_Default_Params()
    {
         //Arrange
         $ts_client = new TurboSMTPClient($this->configuration);
         
         $exportOptionsBuilder = new SuppressionsExportOptionsBuilder();

         $exportOptions = $exportOptionsBuilder
            ->setFrom((new DateTime())->modify('-3 years'))
            ->setTo(new DateTime())
            ->build();

        //Act
        $result = $ts_client->getSuppressions()->exportAsync($exportOptions)->wait();

        //Assert
        $this->assertIsString($result);
        $this->assertGreaterThan(0, strlen($result));       
    }

    public function test_Export_Suppressions_Where_Subject_Contains()
    {
          //Arrange
          $ts_client = new TurboSMTPClient($this->configuration);
         
          $querysRestrictions[] = new SuppressionsRestriction(
            SuppresionsRestrictionFilterBy::subject,
            SuppressionsRestrictionOperator::include,
            'Time',
            true // Smart search enabled
          );

          $exportOptionsBuilder = new SuppressionsExportOptionsBuilder();
 
          $exportOptions = $exportOptionsBuilder
             ->setFrom((new DateTime())->modify('-3 years'))
             ->setTo(new DateTime())
             ->setRestrictions($querysRestrictions)
             ->build();
 
         //Act
         $result = $ts_client->getSuppressions()->exportAsync($exportOptions)->wait();
 
         //Assert
         $this->assertIsString($result);
         $this->assertGreaterThan(0, strlen($result));
         $this->assertStringContainsString("Time",$result);       
    }
}