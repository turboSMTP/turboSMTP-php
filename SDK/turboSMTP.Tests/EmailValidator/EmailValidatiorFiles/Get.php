<?php

namespace TurboSMTPTests\EmailValidator\EmailValidatiorFiles;

use DateTime;
use TurboSMTP\TurboSMTPClient;
use TurboSMTPTests\AppConstants;
use TurboSMTPTests\BaseTestCase;

class Get extends BaseTestCase
{
    public function test_get_by_id_invalid(){
        //Arrange
        $ts_client = new TurboSMTPClient($this->configuration);

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("list_not_found");

        //Act
        $result = $ts_client->getEmailValidatorFiles()->getAsync(0)->wait();
        
        //Assert
        $this->assertNull($result, "The result should be null.");
    }

    public function test_get_by_id_valid(){
        //Arrange
        $ts_client = new TurboSMTPClient($this->configuration);

        //Act
        //Act
        $filename = sprintf("%s-EmailvalidatorFile.txt", $this->get_Formated_DateTime_Compressed());
        $id = $ts_client->getEmailValidatorFiles()->addAsync($filename,AppConstants::InValidEmailAddresses)->wait();
        $result = $ts_client->getEmailValidatorFiles()->getAsync($id)->wait();
        
        //Assert
        $this->assertNotNull($result, "The result should be null.");
        $this->assertEquals($result->getTotalEmails(),2);
    }    
}