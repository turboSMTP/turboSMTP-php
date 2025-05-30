<?php

namespace TurboSMTPTests\EmailValidator;

use TurboSMTPTests\BaseTestCase;

use TurboSMTP\TurboSMTPClient;

class Subscription extends BaseTestCase
{
    public function test_get_subscription(){
        //Arrange
        $ts_client = new TurboSMTPClient($this->configuration);

        //Act
        $result = $ts_client->getEmailValidator()->GetEmailValidatorSubscriptionAsync()->wait();
        
        //Assert
        $this->assertNotNull($result, 'Expected result to be not null.');
    }
}