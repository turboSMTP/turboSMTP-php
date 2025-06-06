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
use TurboSMTP\TurboSMTPClient;

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
* [Suppressions](#suppressions)
* [Email Validator](#email-validator)
* [Email Validator Files](#email-validator-files)

# Email Messages

## Send Email Messages

The **SendAsync** method is an asynchronous operation that handles the process of sending an email message. The method takes an `EmailMessage` object as input and returns a `SendDetails` object, which contains the result of the email sending operation.

```php
use TurboSMTP\TurboSMTPClient;
use TurboSMTP\Domain\EmailMessage\EmailMessageBuilder;

//Create an instance of EmailMessage        
$emailBuilder = new EmailMessageBuilder();

// Build the email message
$emailMessage = $emailBuilder
    ->setFrom('sender@your-domain.com')
    ->addTo('recipient@recipient-domain.com')
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
use DateTime;
use TurboSMTP\TurboSMTPClient;
use TurboSMTP\Model\Relays\RelaysQueryOptionsBuilder;

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

## Export Relays Details To CSV

The **exportAsync** method is an asynchronous operation designed to export relay data based on specified export options. The method takes a `RelaysExportOptions` object as input  and returns the data in CSV formated string, which can then be saved or further processed.

```php

use DateTime;
use TurboSMTP\TurboSMTPClient;
use TurboSMTP\Model\Relays\RelaysExportOptionsBuilder;

//Create an instance of RealysExportOptions
$queryOptionsBuilder = new RelaysExportOptionsBuilder();

$queryOptions = $queryOptionsBuilder
    ->setFrom((new DateTime())->modify('-3 years'))
    ->setTo(new DateTime())
    ->build();
           
//Create a new instance of TurboSMTPClient
$ts_client = new TurboSMTPClient($configuration);

//Export Relays to CSV
$csvTextContent = $ts_client->getRelays()->exportAsync($queryOptions)->wait();
```

# Suppressions

## Add a Single Suppression

The **AddAsync** method is an asynchronous operation that handles the process of adding an email address to the suppressions list. The method takes the *reason for the suppression* and the *email address to add to the suppresions list* as input and returns a `SuppressionsAddResult` object, which contains the result of the Add operation.

```php
use TurboSMTP\TurboSMTPClient;

//Describe suppression reason
$suppressionReason = "Manual Processing of Removal Request";

//Declare email address to add to suppressions.
$suppressionEmailAddress = "recipient@recipient.domain.com";

//Create a new instance of TurboSMTPClient
$ts_client = new TurboSMTPClient($configuration);

//Add Suppression
$suppressionsAddResult = $ts_client->GetSuppressions()->addAsync($suppressionReason,$suppressionEmailAddress)->wait();

//Evaluate Add Results.
var_dump($suppressionsAddResult);
```

## Add Multiple Suppressions

The **addRangeAsync** method is an asynchronous operation that handles the process of adding multiple email addresses to the suppressions list. The method takes the *reason for the suppressions* and a list of *email addresses to add to the suppresions list* as input and returns a `SuppressionsAddResult` object, which contains the result of the addRangeAsync operation.

```php
use TurboSMTP\TurboSMTPClient;

//Describe suppression reason
$suppressionReason = "Manual Processing of Removal Request";

//Create a Test List of email addresses
$suppressionEmailAddressToAdd = [
    "recipient1@domain.com",
    "recipient2@domain.com",
    "recipient3@domain.com"
];

//Create a new instance of TurboSMTPClient
$ts_client = new TurboSMTPClient($configuration);

//Add the Test Mail Addresses to the Suppressions List
$suppressionsAddResult = $ts_client->GetSuppressions()->addRangeAsync($suppressionReason,$suppressionEmailAddressToAdd)->wait();

//Evaluate Add Results.
var_dump($suppressionsAddResult);
```

## Query Suppressions

The **queryAsync** method is an asynchronous operation designed to retrieve paginated results of suppressions data based on specified query options. The method takes a `SuppressionsQueryOptions` object as input and returns PagedListResults object, which contains the total number of records and a list of Suppresion objects.

```php
use DateTime;
use TurboSMTP\TurboSMTPClient;
use TurboSMTP\Model\Suppressions\SuppressionsQueryOptionsBuilder;

//Create an instance of SuppressionsQueryOptions
$queryOptionsBuilder = new SuppressionsQueryOptionsBuilder();
 
$queryOptions = $queryOptionsBuilder
   ->setFrom((new DateTime())->modify('-3 years'))
   ->setTo(new DateTime())
   ->build();

//Create a new instance of TurboSMTPClient
$ts_client = new TurboSMTPClient($configuration);  

//Query Suppressions
$pagedList = $ts_client->getSuppressions()->queryAsync($queryOptions)->wait();

//Evaluate the total ammount of records according to the queryOptions.
echo count($pagedList->getRecords());

//Evaluate returned suppressions.
$records = $pagedList->getRecords();
if (!empty($records)) {
    var_dump($records);
} else {
    echo "No records found.";

```

## Export Suppressions To CSV

The **exportAsync** method is an asynchronous operation designed to export suppressions data based on specified export options. The method takes a `SuppressionsExportOptions` object as input and returns the data in CSV formated string, which can then be saved or further processed.

```php
use DateTime;
use TurboSMTP\TurboSMTPClient;
use TurboSMTP\Model\Suppressions\SuppressionsExportOptionsBuilder;

//Create an instance of SuppressionsExportOptions
$exportOptionsBuilder = new SuppressionsExportOptionsBuilder();
 
$exportOptions = $exportOptionsBuilder
   ->setFrom((new DateTime())->modify('-3 years'))
   ->setTo(new DateTime())
   ->build();

//Create a new instance of TurboSMTPClient
$ts_client = new TurboSMTPClient($configuration);  

//Export Suppressions
$csvTextContent = $ts_client->getSuppressions()->exportAsync($exportOptions)->wait();

var_dump($csvTextContent);
```

## Delete a Single Suppression

The **deleteAsync** method is an asynchronous operation that handles the process of removing an email address from the suppressions list. The method takes the *email address to remove from the suppressions list* as input and returns a boolean result that indicates if the deletion was successful.

```php
use TurboSMTP\TurboSMTPClient;

//Create an instance of SuppressionsExportOptions
$suppressionEmailAddressToRemove = "recipient@recipient.domain.com";

//Create a new instance of TurboSMTPClient
//$ts_client = new TurboSMTPClient($configuration);  

//Remove Suppression
$success = $ts_client->getSuppressions()->deleteAsync($suppressionEmailAddressToRemove)->wait();

//Evaluate result
var_dump($success);
```

## Delete Multiple Suppressions

The **deleteRangeAsync** method is an asynchronous operation that handles the process of removing multiple email addresses from the suppressions list. The method takes a list of *email addresses to remove from the suppresions list* as input and returns a boolean result, that indicates if the deletion was successful.

```php
use TurboSMTP\TurboSMTPClient;

//Create a Test List of email addresses
$suppressionEmailAddressesToRemove = [
    "recipient1@domain.com",
    "recipient2@domain.com",
    "recipient3@domain.com"
];

//Create a new instance of TurboSMTPClient
$ts_client = new TurboSMTPClient($configuration);  

//Remove Suppression
$success = $ts_client->getSuppressions()->deleteRangeAsync($suppressionEmailAddressesToRemove)->wait();

//Evaluate result
var_dump($success);
```

## Delete Suppressions Based on a Criteria

The **deleteWithOptionsAsync** method is an asynchronous operation that handles the process of removing multiple email addresses from the suppressions list according to a filter Criteria. The method takes a `SuppressionsDeleteOptions` object as input and returns a boolean result, that indicates if the deletion was successful.

```php
use DateTime;
use TurboSMTP\TurboSMTPClient;
use TurboSMTP\Domain\Suppressions\SuppresionsRestrictionFilterBy;
use TurboSMTP\Model\Suppressions\SuppressionsRestriction;
use TurboSMTP\Model\Suppressions\SuppressionsRestrictionOperator;
use TurboSMTP\Model\Suppressions\SuppressionsDeleteOptionsBuilder;

//Create an array of suppression restrictions
$suppressionsRestrictions[] = new SuppressionsRestriction(
    SuppresionsRestrictionFilterBy::reason,
    SuppressionsRestrictionOperator::include,
    'Testing Suppressions',
    true // Smart search enabled
);

//Create suppressions delete options with restrictions
 $suppressionsDeleteOptionsBuilder = new SuppressionsDeleteOptionsBuilder();

 $suppressionsDeleteOptions = $suppressionsDeleteOptionsBuilder
    ->setFrom((new DateTime()))
    ->setTo(new DateTime())
    ->setRestrictions($suppressionsRestrictions)
    ->build(); 

//Create a new instance of TurboSMTPClient
$ts_client = new TurboSMTPClient($configuration);  

//Remove Suppression
$success = $ts_client->getSuppressions()->deleteWithOptionsAsync($suppressionsDeleteOptions)->wait();

//Evaluate result
var_dump($success);
```

# Email Validator

## Get Email Validator Subscription.

The **GetEmailValidatorSubscriptionAsync** method is an asynchronous operation that handles the process of retrieving Email Validator Subsctiption details. The method  returns an `EmailValidatorSubscription` object.

```php
use TurboSMTP\TurboSMTPClient;

//Create a new instance of TurboSMTPClient
$ts_client = new TurboSMTPClient($configuration);  

//Get Email Validator Subscription Details
$emailValidatorSubscription = $ts_client->getEmailValidator()->GetEmailValidatorSubscriptionAsync()->wait();

//Evaluate result
var_dump($emailValidatorSubscription);
```

## Validate a Single Email Address.

The **ValidateEmailAddressAsync** method is an asynchronous operation that handles the process of validating an email address. The method takes the *email address to validate* as input and returns an `EmailAddressValidationDetails` object.

```php
use TurboSMTP\TurboSMTPClient;

//Create a new instance of TurboSMTPClient
$ts_client = new TurboSMTPClient($configuration);  

//Validate email address
$emailAddressValidationDetails = $ts_client->getEmailValidator()->ValidateEmailAdressAsync("recipient@recipient-domain.com")->wait();

//Evaluate result
var_dump($emailAddressValidationDetails);
```

# Email Validator Files

## Add a File of Email Addresses

The **addAsync** method is an asynchronous operation that handles the process of adding a list of email addresses. The method takes the *filename* and a list of *email addresses* as input and returns the id of the list just added.

```php
use TurboSMTP\TurboSMTPClient;

//Create a sample list of email addresses.
$contactsDetails = [
    "recipient1@domain.com",
    "recipient2@domain.com",
    "recipient3@domain.com"
];

//Create a new instance of TurboSMTPClient
$ts_client = new TurboSMTPClient($configuration);  

//Add Email Validator File
$emailValidatorFileId = $ts_client->getEmailValidatorFiles()->addAsync("contacts.txt",$contactsDetails)->wait();

//Evaluate result
var_dump($emailValidatorFileId);
```

## Get Single File Details

The **getAsync** method is an asynchronous operation designed to retrieve file data based on a specific file identifier. The method takes the *id* as input and returns an EmailValidatorFile object.

```php
//Create a new instance of TurboSMTPClient
$ts_client = new TurboSMTPClient($configuration);  

//Validate email address
$emailValidatorFile = $ts_client->getEmailValidatorFiles()->getAsync(16518)->wait();

//Evaluate result
var_dump($emailValidatorFile);
```

## Query Files Details

The **queryAsync** method is an asynchronous operation designed to retrieve paginated results of files data based on specified query options. The method takes an `EmailValidatorFilesQueryOptions` object as input and returns PagedListResults object, which contains the total number of records and a list of EmailValidatorFile objects.

```php
use DateTime;
use TurboSMTP\TurboSMTPClient;
use TurboSMTP\Model\EmailValidator\EmailValidatorFilesQueryOptionsBuilder;

//Create an instance of EmailValidatorFilesQueryOptionsBuilder
$queryOptionsBuilder = new EmailValidatorFilesQueryOptionsBuilder();

//Create an instance of EmailValidatorFilesQueryOptions
$queryOptions = $queryOptionsBuilder
    ->setFrom((new DateTime())->modify('-3 years'))
    ->setTo(new DateTime())
    ->build();

//Create a new instance of TurboSMTPClient
$ts_client = new TurboSMTPClient($configuration);  

//Query Email Validator Files
$pagedList  = $ts_client->getEmailValidatorFiles()->queryAsync($queryOptions)->wait();

//Evaluate the Subject of the fist File.
$records = $pagedList->getRecords();
if (!empty($records)) {
    var_dump($records[0]);
} else {
    echo "No records found.";
}
```

## Validate a File

The **validateAsync** method is an asynchronous operation designed to validate (process) a file based on a specific file identifier. The method takes the *id* as input and returns a boolean indicating if validation was sucessfull or not.

```php
use TurboSMTP\TurboSMTPClient;

//Create a new instance of TurboSMTPClient
//$ts_client = new TurboSMTPClient($configuration);  

//Validate file
$validationResult  = $ts_client->getEmailValidatorFiles()->validateAsync(16518)->wait();

//Evaluate result
var_dump($validationResult);
```

## Delete a File

The **deleteAsync** method is an asynchronous operation designed to delete a file based on a specific file identifier. The method takes the *id* as input and returns a boolean indicating if deletion was sucessfull or not.

```csharp
use TurboSMTP\TurboSMTPClient;

//Create a new instance of TurboSMTPClient
$ts_client = new TurboSMTPClient($configuration);  

//Delete a file
$deleteResult  = $ts_client->getEmailValidatorFiles()->deleteAsync(16518)->wait();

//Evaluate result
var_dump($deleteResult);
```

