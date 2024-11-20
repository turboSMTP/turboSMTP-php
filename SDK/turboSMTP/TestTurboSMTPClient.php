<?php

namespace TurboSMTP;

require '../vendor/autoload.php'; // Include Composer autoloader

use API_TurboSMTP_Invoker\API_TurboSMTP_Model\EmailRequestBody;
use TurboSMTP\Domain\EmailMessage;
use TurboSMTP\Domain\EmailMessageBuilder;
use TurboSMTP\Model\Email\SendDetails;

class TestTurboSMTPClient {
    public function run() {
        $emailBuilder = new EmailMessageBuilder();

        // Build the email message
        $emailMessage = $emailBuilder
            ->setFrom('sergio.a.matteoda@gmail.com')
            ->addTo('sergio.a.matteoda@gmail.com')
            ->setSubject('From PHP with EmailBuilder')
            ->setContent('This is the plain text content of the email.')
            ->setHtmlContent('<p>This is the <strong>HTML</strong> content of the email.</p>')
            ->addCustomHeader('X-Custom-Header', 'CustomValue')
            ->setReferenceId('12345')
            ->setCampaignID('Campaign123')
            ->build(); // Call build to get the EmailMessage instance

        $configurationBuilder = new TurboSMTPClientConfigurationBuilder();

        $configuration = $configurationBuilder
            ->setConsumerKey('1ef0eef86f089b18cb610532beecf72e')
            ->setConsumerSecret('GIx7Z0OncXf9oANe8z3gUQ6wYPtJH21d')
            ->build();

        $ts_client = new TurboSMTPClient($configuration);
        
        $promise = $ts_client->getEmailMessages()->SendAsync($emailMessage);
        
        $promise->then(
            function (SendDetails $sendDetails) {
                // Handle successful email sending
                echo "Email sent successfully! Message: " . $sendDetails->getMessage() . ", MID: " . $sendDetails->getMessageID();
            },
            function ($exception) {
                // Handle the error
                echo "Failed to send email: " . $exception->getMessage();
            }
        );

        try {
            $promise->wait(); 
        } catch (\Exception $e) {
            // Handle any exceptions that may occur during wait
            echo 'An error occurred while waiting for the promise: ' . $e->getMessage();
        }
        
        flush();   

    }
}

// Create an instance of TestConsole and run it
$testTurboSMTPClient = new TestTurboSMTPClient();
$testTurboSMTPClient->run();