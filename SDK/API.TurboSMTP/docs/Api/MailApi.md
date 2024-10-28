# API_TurboSMTP_Invoker\MailApi

All URIs are relative to https://pro.api.serversmtp.com/api/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**sendEmail()**](MailApi.md#sendEmail) | **POST** /mail/send | Send email message |


## `sendEmail()`

```php
sendEmail($email_request_body): \API_TurboSMTP_Invoker\API_TurboSMTP_Model\SendSucessResponsetBody
```
### URI(s):
- https://api.turbo-smtp.com/api/v2 turboSMTP SEND production server- https://api.eu.turbo-smtp.com/api/v2 turboSMTP SEND production server for EUROPEAN users
Send email message

Send email message  ###### **Notes:** **- When using API Keys (suggested authentication method), authuser and authpass properties should not be included.**  **- Switch to \"Complete Email Send Request Body\" sample to learn about advanced features such as using attachments, custom headers like reply-to address, tracking and others.**  ###### Limitations:      * The total size of your email, including attachments, must be less than 24MB.

### Example

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


$apiInstance = new API_TurboSMTP_Invoker\Api\MailApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$email_request_body = {"authuser":"user@example.com","authpass":"SMkhhf4J68XX","from":"user@example.com","to":"user@example.com,user2@example.com","subject":"This is a test message","cc":"cc_user@example.com","bcc":"bcc_user@example.com","content":"This is plain text version of the message.","html_content":"This is <b>HTML</b> version of the message."}; // \API_TurboSMTP_Invoker\API_TurboSMTP_Model\EmailRequestBody

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->sendEmail($email_request_body, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MailApi->sendEmail: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **email_request_body** | [**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\EmailRequestBody**](../Model/EmailRequestBody.md)|  | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |


### Return type

[**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\SendSucessResponsetBody**](../Model/SendSucessResponsetBody.md)

### Authorization

[consumerSecret](../../README.md#consumerSecret), [ApiKeyAuth](../../README.md#ApiKeyAuth), [consumerKey](../../README.md#consumerKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
