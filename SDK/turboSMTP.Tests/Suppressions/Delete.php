<?php

namespace TurboSMTPTests\Suppressions;

use DateTime;
use TurboSMTP\Model\Suppressions\SuppressionsDeleteOptionsBuilder;
use TurboSMTP\TurboSMTPClient;
use TurboSMTPTests\AppConstants;
use TurboSMTPTests\BaseTestCase;

use function PHPUnit\Framework\assertTrue;

class Delete extends BaseTestCase
{
    public function test_delete_empty_range()
    {
        // Arrange
        $emails = []; // Empty email list
        $ts_client = new TurboSMTPClient($this->configuration);        

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("The email list cannot be null or empty.");

        // Act
        $ts_client->GetSuppressions()->deleteRangeAsync($emails)->wait();
    }

    public function test_delete_1_invalidAddress()
    {
        // Arrange
        $emailAddressToDelete = "randomabcd"; 
        $ts_client = new TurboSMTPClient($this->configuration);
        
        // Act
        $result = $ts_client->GetSuppressions()->deleteAsync($emailAddressToDelete)->wait();    
        
        //Assert
        $this->assertTrue($result);
    }

    public function test_delete_1_addedAddress()
    {
         // Arrange
         $emailAddressToDelete = "abcd@gmail.com"; 
         $ts_client = new TurboSMTPClient($this->configuration);
         
         //act
         $ts_client->GetSuppressions()->addAsync("PHP Adding One to Delete- " . $this->get_Formated_DateTime_Compressed(), $emailAddressToDelete)->wait();
         $result = $ts_client->GetSuppressions()->deleteAsync($emailAddressToDelete)->wait();

         //Assert
         $this->assertTrue($result==true, "Result should be true");        
    }

    public function test_delete_2_addedAddress()
    {
         // Arrange
         $emailAddressesToDelete = ["abcd@gmail.com", "efgh@gmail.com"]; 
         $ts_client = new TurboSMTPClient($this->configuration);
         
         //act
         $ts_client->GetSuppressions()->addRangeAsync("PHP Adding Two to Delete- " . $this->get_Formated_DateTime_Compressed(), $emailAddressesToDelete)->wait();
         $result = $ts_client->GetSuppressions()->deleteRangeAsync($emailAddressesToDelete)->wait();

         //Assert
         $this->assertTrue($result==true, "Result should be true");        
    }
    
    public function test_delete_today_suppressions_with_default_params()
    {
         // Arrange
         $ts_client = new TurboSMTPClient($this->configuration);
         $emailAddressToDelete = "today@gmail.com"; 
         $suppressionsDeleteOptionsBuilder = new SuppressionsDeleteOptionsBuilder();

         $suppressionsDeleteOptions = $suppressionsDeleteOptionsBuilder
            ->setFrom((new DateTime()))
            ->setTo(new DateTime())
            ->build();

        $ts_client->GetSuppressions()->addAsync("PHP Adding One to Delete Today Suppressions- " . $this->get_Formated_DateTime_Compressed(), $emailAddressToDelete)->wait();
        
        //Act
        $result = $ts_client->getSuppressions()->deleteWithOptionsAsync($suppressionsDeleteOptions)->wait();

        //Assert
        $this->assertTrue($result==true, "Result should be true");  
    }
}