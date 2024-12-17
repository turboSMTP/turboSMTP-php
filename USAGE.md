[api_reference]: https://serversmtp.com/turbo-api/
[openapi_generator]: https://openapi-generator.tech/

This documentation is based on our [Open API Specification][api_reference]

# This SDK consists of 2 Core projects + 1 Testing Project.

## **API.TurboSMTP**

This project provides a wrapper for the turboSMTP API. It is automatically generated from our Open API Specification V3 using the [Open API Generator Client][openapi_generator]

## **turboSMTP**

This project offers a higher-level wrapper for **API.TurboSMTP**, simplifying usage by abstracting infrastructure details and the complexities of REST API connections.

## **turboSMTP.Tests**

This project is intended for unit testing the TurboSMTP project. It includes a suite of tests to ensure the correctness, reliability, and performance of the TurboSMTP functionality. By providing comprehensive test coverage, it helps maintain the integrity of the SDK as new features are added or existing ones are modified.

# INITIALIZATION

```php
use TurboSMTP\TurboSMTPClientConfigurationBuilder;
use TurboSMTP\TurboSMTPClientConfiguration;

//Build the TurboSMTP Configuration.
$configurationBuilder = new TurboSMTPClientConfigurationBuilder();

$configuration = $configurationBuilder
	->setConsumerKey(AppConstants::ConsumerKey)
	->setConsumerSecret(AppConstants::ConsumerSecret)
	->setEuropeanUser(AppConstants::EuropeanUser)
	->build();

//Create a new instance of TurboSMTPClient
$ts_client = new TurboSMTPClient($configuration);
```

# Table of Contents

* [Email Messages](#email-messages)
* [Relays](#relays)

# Email Messages

## Send Email Messages

The **SendAsync** method is an asynchronous operation that handles the process of sending an email message. The method takes an `EmailMessage` object as input and returns a `SendDetails` object, which contains the result of the email sending operation.

```php
//Create an instance of EmailMessage        
$emailBuilder = new EmailMessageBuilder();

// Build the email message
$emailMessage = $emailBuilder
    ->setFrom(AppConstants::EmailSender)
    ->addTo(AppConstants::ValidEmailAddresses[0])
    ->setSubject('PHP - Trivia contest simple email')
    ->setContent('Do not loose the opportunity to participate..')
    ->setHtmlContent('<p>Do not loose the <strong>opportunity</strong> to participate...</p>')
    ->build(); 

//Create a new instance of TurboSMTPClient
$ts_client = new TurboSMTPClient($configuration);    

//Send the email message            
$result = $ts_client->getEmailMessages()->SendAsync($emailMessage)->wait();

//Evaluate the MessageID assigned to the sent message  
echo $result->getMessageID();    
```

# Relays

## Query Relays Details

The **queryAsync** method is an asynchronous operation designed to retrieve paginated results of relay data based on specified query options. The method takes a `RelaysQueryOptions` object as input and returns PagedListResults object, which contains the total number of records and a list of Relay objects.

```php
//Create an instance of RealysQueryOptions
$queryOptionsBuilder = new RelaysQueryOptionsBuilder();

$queryOptions = $queryOptionsBuilder
    ->setFrom((new DateTime())->modify('-3 years'))
    ->setTo(new DateTime())
    ->build();
           
//Create a new instance of TurboSMTPClient
$ts_client = new TurboSMTPClient($configuration);

//Query Relays
$pagedList  = $ts_client->getRelays()->queryAsync($queryOptions)->wait();

//Evaluate the total ammount of records according to the queryOptions.
echo count($pagedList->getRecords());

//Evaluate the Subject of the fist Relay.
$records = $pagedList->getRecords();
if (!empty($records)) {
    echo $records[0]->Subject;
} else {
    echo "No records found.";
}
```

