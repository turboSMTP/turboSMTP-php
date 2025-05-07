<?php

namespace TurboSMTPTests\EmailValidator;

use TurboSMTPTests\BaseTestCase;
use TurboSMTPTests\AppConstants;

use TurboSMTP\TurboSMTPClient;

use TurboSMTP\Domain\EmailValidator\EmailAddressValidationStatus;

class ValidateEmailAddress extends BaseTestCase
{
    public function test_validate_valid_email_address(){
        //Arrange
        $ts_client = new TurboSMTPClient($this->configuration);

        //Act
        $result = $ts_client->getEmailValidator()->ValidateEmailAdressAsync(AppConstants::ValidEmailAddresses[0])->wait();
        
        //Assert
        $this->assertEquals(
            strtolower($result->getEmail()),
            strtolower(AppConstants::ValidEmailAddresses[0])
        );

        $this->assertEquals(
            $result->getStatus(),
            EmailAddressValidationStatus::Valid
        );
    }

    public function test_validate_invvalid_email_address(){
        //Arrange
        $ts_client = new TurboSMTPClient($this->configuration);

        //Act
        $result = $ts_client->getEmailValidator()->ValidateEmailAdressAsync(AppConstants::InValidEmailAddresses[0])->wait();
        
        //Assert
        $this->assertEquals(
            strtolower($result->getEmail()),
            strtolower(AppConstants::InValidEmailAddresses[0])
        );

        $this->assertNotEquals(
            $result->getStatus(),
            EmailAddressValidationStatus::Valid
        );
    }    
}