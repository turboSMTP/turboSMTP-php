<?php

namespace TurboSMTPTests\EmailValidator;

use TurboSMTPTests\BaseTestCase;
use TurboSMTPTests\TestsSampleData;

use TurboSMTP\TurboSMTPClient;

use TurboSMTP\Domain\EmailValidator\EmailAddressValidationStatus;

class ValidateEmailAddress extends BaseTestCase
{
    public function test_validate_valid_email_address(){
        //Arrange
        $ts_client = new TurboSMTPClient($this->configuration);

        //Act
        $result = $ts_client->getEmailValidator()->ValidateEmailAdressAsync(TestsSampleData::ValidEmailAddresses[0])->wait();
        
        //Assert
        $this->assertEquals(
            strtolower($result->getEmail()),
            strtolower(TestsSampleData::ValidEmailAddresses[0])
        );

        $this->assertTrue(
            $result->getStatus() === EmailAddressValidationStatus::Valid ||
            $result->getStatus() === EmailAddressValidationStatus::DoNotMail,
            'The status must be either Valid or DoNotEmail.'
        );
    }

    public function test_validate_invvalid_email_address(){
        //Arrange
        $ts_client = new TurboSMTPClient($this->configuration);

        //Act
        $result = $ts_client->getEmailValidator()->ValidateEmailAdressAsync(TestsSampleData::InValidEmailAddresses[0])->wait();
        
        //Assert
        $this->assertEquals(
            strtolower($result->getEmail()),
            strtolower(TestsSampleData::InValidEmailAddresses[0])
        );

        $this->assertNotEquals(
            $result->getStatus(),
            EmailAddressValidationStatus::Valid
        );
    }    
}