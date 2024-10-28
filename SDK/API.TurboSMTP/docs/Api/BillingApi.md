# API_TurboSMTP_Invoker\BillingApi

All URIs are relative to https://pro.api.serversmtp.com/api/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**buyEmailValidatorCredits()**](BillingApi.md#buyEmailValidatorCredits) | **POST** /billing/buy_emailvalidation_credits | Buy Email Validator Credits |


## `buyEmailValidatorCredits()`

```php
buyEmailValidatorCredits($buy_email_validator_credits_request): \API_TurboSMTP_Invoker\API_TurboSMTP_Model\BuyEmailValidatorCreditsSucessResponse
```

Buy Email Validator Credits

Buy Email Validator Credits

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


$apiInstance = new API_TurboSMTP_Invoker\Api\BillingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$buy_email_validator_credits_request = new \API_TurboSMTP_Invoker\API_TurboSMTP_Model\BuyEmailValidatorCreditsRequest(); // \API_TurboSMTP_Invoker\API_TurboSMTP_Model\BuyEmailValidatorCreditsRequest

try {
    $result = $apiInstance->buyEmailValidatorCredits($buy_email_validator_credits_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BillingApi->buyEmailValidatorCredits: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **buy_email_validator_credits_request** | [**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\BuyEmailValidatorCreditsRequest**](../Model/BuyEmailValidatorCreditsRequest.md)|  | |

### Return type

[**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\BuyEmailValidatorCreditsSucessResponse**](../Model/BuyEmailValidatorCreditsSucessResponse.md)

### Authorization

[consumerSecret](../../README.md#consumerSecret), [ApiKeyAuth](../../README.md#ApiKeyAuth), [consumerKey](../../README.md#consumerKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
