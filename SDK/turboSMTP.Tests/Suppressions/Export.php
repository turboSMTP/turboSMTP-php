<?php

namespace TurboSMTPTests\Suppressions;

use TurboSMTP\Model\Suppressions\SuppressionsExportOptionsBuilder;
use DateTime;
use TurboSMTP\Domain\Suppressions\Suppression;
use TurboSMTP\Model\Suppressions\SuppressionsDeleteOptionsBuilder;
use TurboSMTP\TurboSMTPClient;
use TurboSMTPTests\AppConstants;
use TurboSMTPTests\BaseTestCase;
use TurboSMTP\Domain\Suppressions\SuppressionSource;
use TurboSMTP\Model\Suppressions\SuppressionsRestriction;
use TurboSMTP\Model\Suppressions\SuppressionsRestrictionOperator;
use TurboSMTP\Domain\Suppressions\SuppresionsRestrictionFilterBy;
use TurboSMTP\Model\Suppressions\SuppressionsQueryOptionsBuilder;
use TurboSMTP\Model\Shared\PagedListResults;

use function PHPUnit\Framework\assertTrue;

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