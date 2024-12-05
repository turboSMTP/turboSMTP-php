<?php

namespace TurboSMTPTests\Emails;

use PHPUnit\Framework\TestCase;
use TurboSMTP\TurboSMTPClient;
use TurboSMTP\Domain\EmailMessageBuilder;
use TurboSMTP\Model\Email\SendDetails;
use TurboSMTPTests\BaseTestCase;
use TurboSMTPTests\AppConstants;

class Send extends BaseTestCase
{
    public function testSendSimpleEmail()
    {
        
        //Arrange
        $ts_client = new TurboSMTPClient($this->configuration);

        $emailBuilder = new EmailMessageBuilder();

        // Build the email message
        $emailMessage = $emailBuilder
            ->setFrom(AppConstants::EmailSender)
            ->addTo(AppConstants::ValidEmailAddresses[0])
            ->setSubject('PHP - Trivia contest simple email')
            ->setContent('Do not loose the opportunity to participate..')
            ->setHtmlContent('<p>Do not loose the <strong>opportunity</strong> to participate...</p>')
            ->build(); // Call build to get the EmailMessage instance
        
        //Act
        $result = $ts_client->getEmailMessages()->SendAsync($emailMessage)->wait();

        //Assert
        $this->assertInstanceOf(SendDetails::class, $result);
        $this->assertEquals('OK', $result->getMessage());
        $this->assertGreaterThan(0, $result->getMid());  
        
        
        //$this->assertEquals(0,0);
    }
}