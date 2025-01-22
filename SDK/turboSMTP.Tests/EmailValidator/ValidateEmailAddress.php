<?php

namespace TurboSMTPTests\EmailValidator;

use DateTime;
use TurboSMTP\TurboSMTPClient;
use TurboSMTPTests\BaseTestCase;
use TurboSMTPTests\AppConstants;
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
}