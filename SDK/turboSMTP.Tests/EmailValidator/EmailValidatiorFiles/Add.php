<?php

namespace TurboSMTPTests\EmailValidator\EmailValidatiorFiles;

use DateTime;
use TurboSMTP\TurboSMTPClient;
use TurboSMTPTests\AppConstants;
use TurboSMTPTests\BaseTestCase;

class Add extends BaseTestCase
{
    public function test_add_with_2_invalid_addresses(){
        //Arrange
        $ts_client = new TurboSMTPClient($this->configuration);

        //Act
        $filename = sprintf("%s-EmailvalidatorFile.txt", $this->get_Formated_DateTime_Compressed());
        $result = $ts_client->getEmailValidatorFiles()->addAsync($filename,AppConstants::InValidEmailAddresses)->wait();
        
        //Assert
        $this->assertGreaterThan(0, strlen($result));
    }
}