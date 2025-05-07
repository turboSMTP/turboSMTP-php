<?php

namespace TurboSMTPTests\Suppressions;

use DateTime;

use TurboSMTPTests\BaseTestCase;

use TurboSMTP\TurboSMTPClient;

use TurboSMTP\Domain\Suppressions\SuppressionSource;
use TurboSMTP\Domain\Suppressions\SuppresionsRestrictionFilterBy;

use TurboSMTP\Model\Suppressions\SuppressionsDeleteOptionsBuilder;
use TurboSMTP\Model\Suppressions\SuppressionsRestriction;
use TurboSMTP\Model\Suppressions\SuppressionsRestrictionOperator;

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

    public function test_delete_manual_suppressions()
    {
         // Arrange
         $ts_client = new TurboSMTPClient($this->configuration);       
         $emailAddressToDelete = "today@gmail.com"; 
         $suppressionsDeleteOptionsBuilder = new SuppressionsDeleteOptionsBuilder();

         $suppressionsDeleteOptions = $suppressionsDeleteOptionsBuilder
            ->setFrom((new DateTime()))
            ->setTo(new DateTime())
            ->setFilter("")
            ->setFilterBy([SuppressionSource::manual])
            ->build(); 
        
        $ts_client->GetSuppressions()->addAsync("PHP Adding One to Delete Today Manual Suppressions- " . $this->get_Formated_DateTime_Compressed(), $emailAddressToDelete)->wait();
        
        //Act
        $result = $ts_client->getSuppressions()->deleteWithOptionsAsync($suppressionsDeleteOptions)->wait();
    
        //Assert
        $this->assertTrue($result==true, "Result should be true");          
    }

    public function test_delete_suppressions_with_filter()
    {
         // Arrange
         $ts_client = new TurboSMTPClient($this->configuration);       
         $emailAddressToDelete = "today@gmail.com"; 
         $suppressionsDeleteOptionsBuilder = new SuppressionsDeleteOptionsBuilder();

         $suppressionsDeleteOptions = $suppressionsDeleteOptionsBuilder
            ->setFrom((new DateTime()))
            ->setTo(new DateTime())
            ->setFilter("Delete Today Manual")
            ->setSmartSearch(true)
            ->build(); 
        
        $ts_client->GetSuppressions()->addAsync("PHP Adding One to Delete Today Manual Suppressions- " . $this->get_Formated_DateTime_Compressed(), $emailAddressToDelete)->wait();
        
        //Act
        $result = $ts_client->getSuppressions()->deleteWithOptionsAsync($suppressionsDeleteOptions)->wait();
    
        //Assert
        $this->assertTrue($result==true, "Result should be true");  
    }

    public function test_delete_suppressions_where_reason_contains()
    {
         // Arrange
         $ts_client = new TurboSMTPClient($this->configuration);       
         $emailAddressToDelete = "today@gmail.com"; 
         $suppressionsRestrictions[] = new SuppressionsRestriction(
            SuppresionsRestrictionFilterBy::reason,
            SuppressionsRestrictionOperator::include,
            'By Subject Contains',
            true // Smart search enabled
        );

         $suppressionsDeleteOptionsBuilder = new SuppressionsDeleteOptionsBuilder();

         $suppressionsDeleteOptions = $suppressionsDeleteOptionsBuilder
            ->setFrom((new DateTime()))
            ->setTo(new DateTime())
            ->setRestrictions($suppressionsRestrictions)
            ->build(); 
        
        $addResult = $ts_client->GetSuppressions()->addAsync("PHP Adding To Delete By Subject Contains- " . $this->get_Formated_DateTime_Compressed(), $emailAddressToDelete)->wait();
        
        //Act
        $result = $ts_client->getSuppressions()->deleteWithOptionsAsync($suppressionsDeleteOptions)->wait();
    
        //Assert
        $this->assertTrue($result==true, "Result should be true");          
    }
    
}