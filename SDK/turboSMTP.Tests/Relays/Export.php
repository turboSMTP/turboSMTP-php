<?php

namespace TurboSMTPTests\Relays;

use DateTime;
use TurboSMTP\TurboSMTPClient;
use TurboSMTPTests\BaseTestCase;
use TurboSMTP\Model\Relays\RelaysQueryOptionsBuilder;
use TurboSMTP\Model\Relays\RelaysExportOptionsBuilder;
use TurboSMTP\Model\Shared\PagedListResults;
use TurboSMTP\Model\Relays\RelayFilterCriteria;
use TurboSMTP\Domain\RelayStatus;

class Export extends BaseTestCase
{

    private function ProcessCSVData(string $csvData)
    {
        // Split the CSV data into lines
        $lines = explode("\n", $csvData);

        // Get the headers from the first line
        $headers = str_getcsv(array_shift($lines), ";");

        // Initialize an array to hold the result
        $result = [];

        // Loop through the remaining lines
        foreach ($lines as $line) {
            // Skip empty lines
            if (trim($line) === '') {
                continue;
            }

            // Parse the line into an array
            $data = str_getcsv($line, ";");

            // Combine headers with data to create an associative array
            $result[] = array_combine($headers, $data);
        }

        return $result;
    }

    public function test_export_with_default_params()
    {
        //Arrange
         $ts_client = new TurboSMTPClient($this->configuration);
         
         $exportOptionsBuilder = new RelaysExportOptionsBuilder();

         $exportOptions = $exportOptionsBuilder
            ->setFrom((new DateTime())->modify('-3 years'))
            ->setTo(new DateTime())
            ->build();

        //Act
        $result = $ts_client->getRelays()->exportAsync($exportOptions)->wait();

        //Assert
        $this->assertGreaterThan(0, strlen($result));   
    }

    public function test_query_filtered_by_subject()
    {
        //Arrange
        $ts_client = new TurboSMTPClient($this->configuration);
         
        $exportOptionsBuilder = new RelaysExportOptionsBuilder();

        $exportOptions = $exportOptionsBuilder
           ->setFrom((new DateTime())->modify('-3 years'))
           ->setTo(new DateTime())
           ->setFilterBy([RelayFilterCriteria::subject])
           ->setFilter('test')           
           ->build();

       //Act
       $result = $ts_client->getRelays()->exportAsync($exportOptions)->wait();

       //Assert
       $this->assertGreaterThan(0, strlen($result));
       $this->assertStringContainsString($exportOptions->getFilter(), $result);
    }    

    public function test_query_filtered_by_status()
    {
          //Arrange
          $ts_client = new TurboSMTPClient($this->configuration);
         
          $exportOptionsBuilder = new RelaysExportOptionsBuilder();

          $deliveredRelayStatuses = [
            RelayStatus::SUCCESS,
            RelayStatus::OPEN,
            RelayStatus::CLICK,
            RelayStatus::UNSUB,
            RelayStatus::REPORT
        ];          
 
        $exportOptions = $exportOptionsBuilder
             ->setFrom((new DateTime())->modify('-3 years'))
             ->setTo(new DateTime())
             ->setRelayStatuses($deliveredRelayStatuses)
             ->build();
 
         //Act

         $result = $ts_client->getRelays()->exportAsync($exportOptions)->wait();
 
         //Assert
         $this->assertGreaterThan(0, strlen($result));

         $arr = $this->ProcessCSVData($result);
         foreach ($arr as $record) {
            $this->assertContains($record['Status'], array_map(fn($status) => $status->value, $deliveredRelayStatuses));
        }          
      }      
}