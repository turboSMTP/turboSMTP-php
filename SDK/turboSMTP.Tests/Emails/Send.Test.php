<?php

namespace TurboSMTPTests\Emails;

use TurboSMTPTests\BaseTestCase;
use TurboSMTPTests\TestsSampleData;

use TurboSMTP\TurboSMTPClient;

use TurboSMTP\Domain\EmailMessage\EmailMessageBuilder;
use TurboSMTP\Model\Email\SendDetails;

class Send extends BaseTestCase
{
    public function test_send_simple_email()
    {
        //Arrange
        $ts_client = new TurboSMTPClient($this->configuration);

        // Build the email message
        $emailBuilder = new EmailMessageBuilder();
        $emailMessage = $emailBuilder
            ->setFrom(TestsSampleData::EmailSender)
            ->addTo(TestsSampleData::ValidEmailAddresses[0])
            ->setSubject('PHP - Trivia contest simple email')
            ->setContent('Do not loose the opportunity to participate..')
            ->setHtmlContent('<p>Do not loose the <strong>opportunity</strong> to participate...</p>')
            ->build(); // Call build to get the EmailMessage instance
        
        //Act
        $result = $ts_client->getEmailMessages()->SendAsync($emailMessage)->wait();

        //Assert
        $this->assertInstanceOf(SendDetails::class, $result);
        $this->assertEquals('OK', $result->getMessage());
        $this->assertGreaterThan(0, $result->getMessageID());  
    }

    public function test_send_complete_email()
    {
        //Arrange
        $ts_client = new TurboSMTPClient($this->configuration);

        // Build the email message
        $emailBuilder = new EmailMessageBuilder();

        $emailMessage = $emailBuilder
            ->setFrom(TestsSampleData::EmailSender)
            ->addTo(TestsSampleData::ValidEmailAddresses[0])
            ->addTo(TestsSampleData::ValidEmailAddresses[1])
            ->setSubject('PHP - Trivia contest simple email - Full - ' . $this->get_full_date_time())
            ->setContent('Do not loose the opportunity to participate..')
            ->setHtmlContent('<p>Do not loose the <strong>opportunity</strong> to participate...</p>')
            ->addCustomHeader('List-Unsubscribe','https://www.example.com/unlist?id=8822772727')
            ->addCustomHeader('X-Entity-Ref-ID','4ec7b020-51dc-442f-bd39-9b0a32c3eb83')
            ->addCustomHeader('Tracking-Id','888884433')
            ->addCustomHeader('reply-to','alternative-email@domain.com')
            ->setReferenceId((string)rand(1000, 100000))
            ->setCampaignID('PHP SDK Test')
            ->addBcc('bcc@example.com')
            ->addCc('cc@gmail.com')
            ->build(); // Call build to get the EmailMessage instance
        
        //Act
        $result = $ts_client->getEmailMessages()->SendAsync($emailMessage)->wait();

        //Assert
        $this->assertInstanceOf(SendDetails::class, $result);
        $this->assertEquals('OK', $result->getMessage());
        $this->assertGreaterThan(0, $result->getMessageID());  
    }    
}