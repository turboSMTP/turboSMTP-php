# OpenAPIClient-php

This document describes all public turboSMTP **V2** API and offers endpoints Descriptions, Parameters, Requests, Responses and Samples of usage.

[Click here to view the previous version of turboSMTP Public API Version 1.0](https://www.serversmtp.com/turbo-api-1)


# Security
For the most part (and where not otherwise explicit) turboSMTP’s API requires Authorization. 

Authorization to access a user’s resource is granted to clients provided they set  authentication headers into their request, valued with the proper values issued by turboSMTP servers.

## *  Authorization via ConsumerKey/ConsumerSecret

This type of authorization consists of a pair of headers, named consumerKey and consumerSecret that are created and granted to the end user to be used in a permanent way (unless they´re deleted of course). This kind of authentication is intended to provide access to endpoints features without the need of providing the user the account details (email address + password).

*consumerKey:* Consumer Key Granted.

*consumerSecret:* Consumer Secret Granted.

(Use [/consumerKeys/create](#/consumerkey/createConsumerKey) create a consumer key/secret pair).    

## *  Authorization via Authentication Key

The authentication key is user-based and it is issued by turboSMTP servers upon successful user’s email address + password challenge, performed by means of appropriate request.    

*Authorization:* Authorization_Key

(Use [/authentication/authorize](#/authentication/AuthenticationLogin) to obtain an API Key)

# Data Interchange Format

For the most part (and where not otherwise explicit) turboSMTP’s API uses JSON as the data format of choice when it comes to request and response bodies.



  



## Installation & Usage

### Requirements

PHP 7.4 and later.
Should also work with PHP 8.0.

### Composer

To install the bindings via [Composer](https://getcomposer.org/), add the following to `composer.json`:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/GIT_USER_ID/GIT_REPO_ID.git"
    }
  ],
  "require": {
    "GIT_USER_ID/GIT_REPO_ID": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
<?php
require_once('/path/to/OpenAPIClient-php/vendor/autoload.php');
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



// Configure API key authorization: consumerSecret
$config = API_TurboSMTP_Invoker\Configuration::getDefaultConfiguration()->setApiKey('consumerSecret', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = API_TurboSMTP_Invoker\Configuration::getDefaultConfiguration()->setApiKeyPrefix('consumerSecret', 'Bearer');

// Configure API key authorization: ApiKeyAuth
$config = API_TurboSMTP_Invoker\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = API_TurboSMTP_Invoker\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

// Configure API key authorization: consumerKey
$config = API_TurboSMTP_Invoker\Configuration::getDefaultConfiguration()->setApiKey('consumerKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = API_TurboSMTP_Invoker\Configuration::getDefaultConfiguration()->setApiKeyPrefix('consumerKey', 'Bearer');


$apiInstance = new API_TurboSMTP_Invoker\Api\AlertsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$alert_base = new \API_TurboSMTP_Invoker\API_TurboSMTP_Model\AlertBase(); // \API_TurboSMTP_Invoker\API_TurboSMTP_Model\AlertBase

try {
    $result = $apiInstance->createAlert($alert_base);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AlertsApi->createAlert: ', $e->getMessage(), PHP_EOL;
}

```

## API Endpoints

All URIs are relative to *https://pro.api.serversmtp.com/api/v2*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*AlertsApi* | [**createAlert**](docs/Api/AlertsApi.md#createalert) | **POST** /tools/alerts | Create new Alert Notification
*AlertsApi* | [**deleteAlert**](docs/Api/AlertsApi.md#deletealert) | **DELETE** /tools/alerts/{Id} | Delete Alert Notification
*AlertsApi* | [**getAlert**](docs/Api/AlertsApi.md#getalert) | **GET** /tools/alerts/{Id} | Get Alert Notification
*AlertsApi* | [**getAlerts**](docs/Api/AlertsApi.md#getalerts) | **GET** /tools/alerts | Get Alerts Notifications Information
*AlertsApi* | [**updateAlert**](docs/Api/AlertsApi.md#updatealert) | **PATCH** /tools/alerts/{Id} | Update Alert Notification
*AnalyticsApi* | [**exportAnalyticsDataCSV**](docs/Api/AnalyticsApi.md#exportanalyticsdatacsv) | **GET** /analytics/csv | Export Analytics data in CSV file
*AnalyticsApi* | [**getAnalyticsData**](docs/Api/AnalyticsApi.md#getanalyticsdata) | **GET** /analytics | Get Analytics Data
*AnalyticsApi* | [**getAnalyticsDataByID**](docs/Api/AnalyticsApi.md#getanalyticsdatabyid) | **GET** /analytics/{Id} | Get Analytics Single Item by ID
*AuthenticationApi* | [**authenticationLogin**](docs/Api/AuthenticationApi.md#authenticationlogin) | **POST** /authorize | Login - Get API Key
*AuthenticationApi* | [**authenticationLogout**](docs/Api/AuthenticationApi.md#authenticationlogout) | **POST** /deauthorize | Logout - Revoke API Key
*AuthenticationApi* | [**changePassword**](docs/Api/AuthenticationApi.md#changepassword) | **PUT** /change-password | Change turboSMTP password
*AuthenticationApi* | [**checkValidityTokenResetPassword**](docs/Api/AuthenticationApi.md#checkvaliditytokenresetpassword) | **GET** /forgot-password | Forgot Password - Verify if Secret Passord Recovery token is valid.
*AuthenticationApi* | [**sendSecretTokenResetPassword**](docs/Api/AuthenticationApi.md#sendsecrettokenresetpassword) | **POST** /forgot-password | Forgot Password - Use in case you don´t remember your turboSMTP password
*AuthenticationApi* | [**updateResetPassword**](docs/Api/AuthenticationApi.md#updateresetpassword) | **PUT** /forgot-password | Forgot Password - change password
*BillingApi* | [**buyEmailValidatorCredits**](docs/Api/BillingApi.md#buyemailvalidatorcredits) | **POST** /billing/buy_emailvalidation_credits | Buy Email Validator Credits
*ConsumerkeyApi* | [**createConsumerKey**](docs/Api/ConsumerkeyApi.md#createconsumerkey) | **POST** /user/consumerKeys | Create Consumer Key
*ConsumerkeyApi* | [**deleteConsumerKey**](docs/Api/ConsumerkeyApi.md#deleteconsumerkey) | **DELETE** /user/consumerKeys/{consumerKey} | Delete Consumer Key
*ConsumerkeyApi* | [**listConsumerKeys**](docs/Api/ConsumerkeyApi.md#listconsumerkeys) | **GET** /user/consumerKeys | Get Consumer Keys list
*EmailValidatorApi* | [**deleteEmailValidationListById**](docs/Api/EmailValidatorApi.md#deleteemailvalidationlistbyid) | **DELETE** /emailvalidation/lists/{Id} | Delete email validation list
*EmailValidatorApi* | [**exportCSVValidatedEmailsByList**](docs/Api/EmailValidatorApi.md#exportcsvvalidatedemailsbylist) | **GET** /emailvalidation/lists/{Id}/csv | Export Validated Emails by Email Validation List to CSV File
*EmailValidatorApi* | [**getEmailValidationDataByEmailId**](docs/Api/EmailValidatorApi.md#getemailvalidationdatabyemailid) | **GET** /emailvalidation/lists/{Id}/emails/{emailId} | Get Email validation data by email ID.
*EmailValidatorApi* | [**getEmailValidationListSummary**](docs/Api/EmailValidatorApi.md#getemailvalidationlistsummary) | **GET** /emailvalidation/lists/{Id} | Get Email validation list details
*EmailValidatorApi* | [**getEmailValidationLists**](docs/Api/EmailValidatorApi.md#getemailvalidationlists) | **GET** /emailvalidation/lists | Get Email validation lists information
*EmailValidatorApi* | [**getEmailValidationSubscription**](docs/Api/EmailValidatorApi.md#getemailvalidationsubscription) | **GET** /emailvalidation/subscription | Get Email Validation subscription
*EmailValidatorApi* | [**getValidatedEmailsByList**](docs/Api/EmailValidatorApi.md#getvalidatedemailsbylist) | **GET** /emailvalidation/lists/{Id}/emails | Get Validated Emails by Email Validation List
*EmailValidatorApi* | [**uploadEmailValidationFile**](docs/Api/EmailValidatorApi.md#uploademailvalidationfile) | **POST** /emailvalidation/upload | Upload file for email validation
*EmailValidatorApi* | [**validateEmail**](docs/Api/EmailValidatorApi.md#validateemail) | **POST** /emailvalidation/validateEmail | Validate single email address
*EmailValidatorApi* | [**validateEmailValidatorList**](docs/Api/EmailValidatorApi.md#validateemailvalidatorlist) | **POST** /emailvalidation/lists/{Id}/validate | Validate list in Email Validator
*MailApi* | [**sendEmail**](docs/Api/MailApi.md#sendemail) | **POST** /mail/send | Send email message
*MetaApi* | [**getCountries**](docs/Api/MetaApi.md#getcountries) | **GET** /meta/countries | Get countries
*MetaApi* | [**getStatesByCountry**](docs/Api/MetaApi.md#getstatesbycountry) | **GET** /meta/state/{isoCode} | Get states by country
*SubaccountsApi* | [**checkIfAccountEmailExists**](docs/Api/SubaccountsApi.md#checkifaccountemailexists) | **GET** /subaccounts/email-exists | Check if account email exists in turboSMTP
*SubaccountsApi* | [**createSubaccount**](docs/Api/SubaccountsApi.md#createsubaccount) | **POST** /subaccounts | Create Subaccount.
*SubaccountsApi* | [**deleteLogoFile**](docs/Api/SubaccountsApi.md#deletelogofile) | **DELETE** /subaccounts/logo | Delete agency logo
*SubaccountsApi* | [**getActivePlan**](docs/Api/SubaccountsApi.md#getactiveplan) | **GET** /subaccounts/{Id}/active-plan | Get subaccount active plan.
*SubaccountsApi* | [**getAgencySettings**](docs/Api/SubaccountsApi.md#getagencysettings) | **GET** /subaccounts/agency | Update Agency details
*SubaccountsApi* | [**getLogoFile**](docs/Api/SubaccountsApi.md#getlogofile) | **GET** /subaccounts/logo | Get agency logo
*SubaccountsApi* | [**getSubaccountDetails**](docs/Api/SubaccountsApi.md#getsubaccountdetails) | **GET** /subaccounts/{Id} | Get sub account details
*SubaccountsApi* | [**getSubaccounts**](docs/Api/SubaccountsApi.md#getsubaccounts) | **GET** /subaccounts/list | Get Subaccounts lists information
*SubaccountsApi* | [**subaccountAuthenticationLogin**](docs/Api/SubaccountsApi.md#subaccountauthenticationlogin) | **POST** /subaccounts/authorize | Login to a subaccount
*SubaccountsApi* | [**updateAgencySettings**](docs/Api/SubaccountsApi.md#updateagencysettings) | **PATCH** /subaccounts/agency | Update Agency details
*SubaccountsApi* | [**updateSubaccountDetails**](docs/Api/SubaccountsApi.md#updatesubaccountdetails) | **PATCH** /subaccounts/{Id} | Update sub account details
*SubaccountsApi* | [**updateSubaccountSMTPLimit**](docs/Api/SubaccountsApi.md#updatesubaccountsmtplimit) | **POST** /subaccounts/{Id}/updatesubaccountsmtplimit | Set subaccount smtp limit
*SubaccountsApi* | [**updateSubaccountStatus**](docs/Api/SubaccountsApi.md#updatesubaccountstatus) | **POST** /subaccounts/{Id}/updatesubaccountstatus | Set subaccount status
*SubaccountsApi* | [**uploadLogoFile**](docs/Api/SubaccountsApi.md#uploadlogofile) | **POST** /subaccounts/logo | Upload agency logo
*SuppressionsApi* | [**bulkDeleteSuppressions**](docs/Api/SuppressionsApi.md#bulkdeletesuppressions) | **POST** /suppressions/bulk_delete | Bulk delete suppressions
*SuppressionsApi* | [**deleteFilterSuppressions**](docs/Api/SuppressionsApi.md#deletefiltersuppressions) | **POST** /suppressions/delete | Delete suppressions
*SuppressionsApi* | [**exportFilterSuppressions**](docs/Api/SuppressionsApi.md#exportfiltersuppressions) | **POST** /suppressions/csv | Export filtered suppressions
*SuppressionsApi* | [**exportSuppressionsDataCSV**](docs/Api/SuppressionsApi.md#exportsuppressionsdatacsv) | **GET** /suppressions/csv | Export Suppressions data in CSV file
*SuppressionsApi* | [**filterSuppressions**](docs/Api/SuppressionsApi.md#filtersuppressions) | **POST** /suppressions | Filter suppressions
*SuppressionsApi* | [**getSuppressions**](docs/Api/SuppressionsApi.md#getsuppressions) | **GET** /suppressions | Get Suppressions Data
*SuppressionsApi* | [**importSuppressions**](docs/Api/SuppressionsApi.md#importsuppressions) | **POST** /suppressions/import | Import Suppressions

## Models

- [AgencySettings](docs/Model/AgencySettings.md)
- [Alert](docs/Model/Alert.md)
- [AlertBase](docs/Model/AlertBase.md)
- [AlertListSucessResponsetBody](docs/Model/AlertListSucessResponsetBody.md)
- [AnalyticFilterBy](docs/Model/AnalyticFilterBy.md)
- [AnalyticFilterByOption](docs/Model/AnalyticFilterByOption.md)
- [AnalyticMailItem](docs/Model/AnalyticMailItem.md)
- [AnalyticMailStatus](docs/Model/AnalyticMailStatus.md)
- [AnalyticOrderBy](docs/Model/AnalyticOrderBy.md)
- [AnalyticsListSucessResponsetBody](docs/Model/AnalyticsListSucessResponsetBody.md)
- [Attachment](docs/Model/Attachment.md)
- [Authentication](docs/Model/Authentication.md)
- [AuthenticationLoginRequestBody](docs/Model/AuthenticationLoginRequestBody.md)
- [AuthenticationLoginSucessResponsetBody](docs/Model/AuthenticationLoginSucessResponsetBody.md)
- [AuthorizationError](docs/Model/AuthorizationError.md)
- [BaseAgencySettings](docs/Model/BaseAgencySettings.md)
- [BuyEmailValidatorCreditsBadRequestResponseBody](docs/Model/BuyEmailValidatorCreditsBadRequestResponseBody.md)
- [BuyEmailValidatorCreditsRequest](docs/Model/BuyEmailValidatorCreditsRequest.md)
- [BuyEmailValidatorCreditsSucessResponse](docs/Model/BuyEmailValidatorCreditsSucessResponse.md)
- [ChangePasswordBadRequestResponseBody](docs/Model/ChangePasswordBadRequestResponseBody.md)
- [ChangePasswordRequestBody](docs/Model/ChangePasswordRequestBody.md)
- [CheckValidityTokenResetPasswordBadRequestResponseBody](docs/Model/CheckValidityTokenResetPasswordBadRequestResponseBody.md)
- [CommmonResultResponseBody](docs/Model/CommmonResultResponseBody.md)
- [CommonBadRequestResponseBody](docs/Model/CommonBadRequestResponseBody.md)
- [CommonMessageResponseBody](docs/Model/CommonMessageResponseBody.md)
- [CommonSuccessResponseBody](docs/Model/CommonSuccessResponseBody.md)
- [ConsumerKey](docs/Model/ConsumerKey.md)
- [ConsumerKeyCreateRequestBody](docs/Model/ConsumerKeyCreateRequestBody.md)
- [ConsumerKeyCreateResponseBody](docs/Model/ConsumerKeyCreateResponseBody.md)
- [ConsumerKeyListSucessResponsetBody](docs/Model/ConsumerKeyListSucessResponsetBody.md)
- [Country](docs/Model/Country.md)
- [Currency](docs/Model/Currency.md)
- [Email](docs/Model/Email.md)
- [Email1](docs/Model/Email1.md)
- [EmailAddressRequestBody](docs/Model/EmailAddressRequestBody.md)
- [EmailRequestBody](docs/Model/EmailRequestBody.md)
- [EmailValidationUploadResponse](docs/Model/EmailValidationUploadResponse.md)
- [EmailValidatorList](docs/Model/EmailValidatorList.md)
- [EmailValidatorListDeleteSuccess](docs/Model/EmailValidatorListDeleteSuccess.md)
- [EmailValidatorListEmailDetails](docs/Model/EmailValidatorListEmailDetails.md)
- [EmailValidatorMailDetails](docs/Model/EmailValidatorMailDetails.md)
- [EmailValidatorMailDetailsBasic](docs/Model/EmailValidatorMailDetailsBasic.md)
- [EmailValidatorMailSharedDetails](docs/Model/EmailValidatorMailSharedDetails.md)
- [EmailValidatorStatusSummaryItem](docs/Model/EmailValidatorStatusSummaryItem.md)
- [EmailValidatorSubscription](docs/Model/EmailValidatorSubscription.md)
- [EmailValidatorSucessResponsetBody](docs/Model/EmailValidatorSucessResponsetBody.md)
- [EmailValidatorUploadBadRequestResponseBody](docs/Model/EmailValidatorUploadBadRequestResponseBody.md)
- [EmailValidatorValidateBadRequestResponseBody](docs/Model/EmailValidatorValidateBadRequestResponseBody.md)
- [EmailValidatorValidateListBadRequestResponseBody](docs/Model/EmailValidatorValidateListBadRequestResponseBody.md)
- [EmailValidatorValidatedMailsResults](docs/Model/EmailValidatorValidatedMailsResults.md)
- [Logo](docs/Model/Logo.md)
- [OrderType](docs/Model/OrderType.md)
- [SendBadRequestResponseBody](docs/Model/SendBadRequestResponseBody.md)
- [SendSecretTokenResetPasswordBadRequestResponseBody](docs/Model/SendSecretTokenResetPasswordBadRequestResponseBody.md)
- [SendSecretTokenResetPasswordRequestBody](docs/Model/SendSecretTokenResetPasswordRequestBody.md)
- [SendSucessResponsetBody](docs/Model/SendSucessResponsetBody.md)
- [SendUnauthorizedResponseBody](docs/Model/SendUnauthorizedResponseBody.md)
- [SmtpLimitInterval](docs/Model/SmtpLimitInterval.md)
- [State](docs/Model/State.md)
- [SubAccountListSucessResponsetBody](docs/Model/SubAccountListSucessResponsetBody.md)
- [Subaccount](docs/Model/Subaccount.md)
- [SubaccountActivePlan](docs/Model/SubaccountActivePlan.md)
- [SubaccountActiveStatus](docs/Model/SubaccountActiveStatus.md)
- [SubaccountBase](docs/Model/SubaccountBase.md)
- [SubaccountCreateRequest](docs/Model/SubaccountCreateRequest.md)
- [SubaccountIDStatusBase](docs/Model/SubaccountIDStatusBase.md)
- [SubaccountIP](docs/Model/SubaccountIP.md)
- [SubaccountListItem](docs/Model/SubaccountListItem.md)
- [SubaccountPasswordConfirmPassword](docs/Model/SubaccountPasswordConfirmPassword.md)
- [SubaccountPlanBase](docs/Model/SubaccountPlanBase.md)
- [SubaccountSMTPLimit](docs/Model/SubaccountSMTPLimit.md)
- [SubaccountUpdateRequest](docs/Model/SubaccountUpdateRequest.md)
- [Suppression](docs/Model/Suppression.md)
- [SuppressionFilterBy](docs/Model/SuppressionFilterBy.md)
- [SuppressionFilterOrderPageRequestBody](docs/Model/SuppressionFilterOrderPageRequestBody.md)
- [SuppressionFilterOrderRequestBody](docs/Model/SuppressionFilterOrderRequestBody.md)
- [SuppressionFilterRequestBody](docs/Model/SuppressionFilterRequestBody.md)
- [SuppressionImportJson](docs/Model/SuppressionImportJson.md)
- [SuppressionOperator](docs/Model/SuppressionOperator.md)
- [SuppressionOrderBy](docs/Model/SuppressionOrderBy.md)
- [SuppressionRestrictBy](docs/Model/SuppressionRestrictBy.md)
- [SuppressionRestriction](docs/Model/SuppressionRestriction.md)
- [SuppressionSource](docs/Model/SuppressionSource.md)
- [SuppressionUploadBadRequestResponseBody](docs/Model/SuppressionUploadBadRequestResponseBody.md)
- [SuppressionUploadResponse](docs/Model/SuppressionUploadResponse.md)
- [SuppressionsDeleteSuccess](docs/Model/SuppressionsDeleteSuccess.md)
- [SuppressionsSucessResponsetBody](docs/Model/SuppressionsSucessResponsetBody.md)
- [UpdateResetPasswordBadRequestResponseBody](docs/Model/UpdateResetPasswordBadRequestResponseBody.md)
- [UpdateResetPasswordRequestBody](docs/Model/UpdateResetPasswordRequestBody.md)

## Authorization

Authentication schemes defined for the API:
### ApiKeyAuth

- **Type**: API key
- **API key parameter name**: Authorization
- **Location**: HTTP header


### consumerKey

- **Type**: API key
- **API key parameter name**: consumerKey
- **Location**: HTTP header


### consumerSecret

- **Type**: API key
- **API key parameter name**: consumerSecret
- **Location**: HTTP header


## Tests

To run the tests, use:

```bash
composer install
vendor/bin/phpunit
```

## Author

api@turbo-smtp.com

## About this package

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: `2.0.0-oas3`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`
