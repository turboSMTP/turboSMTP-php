# API_TurboSMTP_Invoker\ConsumerkeyApi

All URIs are relative to https://pro.api.serversmtp.com/api/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createConsumerKey()**](ConsumerkeyApi.md#createConsumerKey) | **POST** /user/consumerKeys | Create Consumer Key |
| [**deleteConsumerKey()**](ConsumerkeyApi.md#deleteConsumerKey) | **DELETE** /user/consumerKeys/{consumerKey} | Delete Consumer Key |
| [**listConsumerKeys()**](ConsumerkeyApi.md#listConsumerKeys) | **GET** /user/consumerKeys | Get Consumer Keys list |


## `createConsumerKey()`

```php
createConsumerKey($consumer_key_create_request_body): \API_TurboSMTP_Invoker\API_TurboSMTP_Model\ConsumerKeyCreateResponseBody
```

Create Consumer Key

Create new Consumer Key  Note: Consumer Key creation is not allwed when authenticated via Consumer Key.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKeyAuth
$config = API_TurboSMTP_Invoker\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = API_TurboSMTP_Invoker\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new API_TurboSMTP_Invoker\Api\ConsumerkeyApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$consumer_key_create_request_body = new \API_TurboSMTP_Invoker\API_TurboSMTP_Model\ConsumerKeyCreateRequestBody(); // \API_TurboSMTP_Invoker\API_TurboSMTP_Model\ConsumerKeyCreateRequestBody

try {
    $result = $apiInstance->createConsumerKey($consumer_key_create_request_body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConsumerkeyApi->createConsumerKey: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **consumer_key_create_request_body** | [**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\ConsumerKeyCreateRequestBody**](../Model/ConsumerKeyCreateRequestBody.md)|  | |

### Return type

[**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\ConsumerKeyCreateResponseBody**](../Model/ConsumerKeyCreateResponseBody.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteConsumerKey()`

```php
deleteConsumerKey($consumer_key): \API_TurboSMTP_Invoker\API_TurboSMTP_Model\CommonSuccessResponseBody
```

Delete Consumer Key

Delete Consumer Key Note: Consumer Key deletion is not allwed when authenticated via Comsumer Key.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKeyAuth
$config = API_TurboSMTP_Invoker\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = API_TurboSMTP_Invoker\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new API_TurboSMTP_Invoker\Api\ConsumerkeyApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$consumer_key = b914ad238d0e8e8851b81e86ce46ae1d; // string | Consumer Key

try {
    $result = $apiInstance->deleteConsumerKey($consumer_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConsumerkeyApi->deleteConsumerKey: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **consumer_key** | **string**| Consumer Key | |

### Return type

[**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\CommonSuccessResponseBody**](../Model/CommonSuccessResponseBody.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listConsumerKeys()`

```php
listConsumerKeys(): \API_TurboSMTP_Invoker\API_TurboSMTP_Model\ConsumerKeyListSucessResponsetBody
```

Get Consumer Keys list

Get Consumer Keys list  Note: Consumer Keys listing is not allwed when authenticated via Consumer Key.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKeyAuth
$config = API_TurboSMTP_Invoker\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = API_TurboSMTP_Invoker\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new API_TurboSMTP_Invoker\Api\ConsumerkeyApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->listConsumerKeys();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConsumerkeyApi->listConsumerKeys: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\ConsumerKeyListSucessResponsetBody**](../Model/ConsumerKeyListSucessResponsetBody.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
