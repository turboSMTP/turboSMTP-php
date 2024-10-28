# API_TurboSMTP_Invoker\EmailValidatorApi

All URIs are relative to https://pro.api.serversmtp.com/api/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**deleteEmailValidationListById()**](EmailValidatorApi.md#deleteEmailValidationListById) | **DELETE** /emailvalidation/lists/{Id} | Delete email validation list |
| [**exportCSVValidatedEmailsByList()**](EmailValidatorApi.md#exportCSVValidatedEmailsByList) | **GET** /emailvalidation/lists/{Id}/csv | Export Validated Emails by Email Validation List to CSV File |
| [**getEmailValidationDataByEmailId()**](EmailValidatorApi.md#getEmailValidationDataByEmailId) | **GET** /emailvalidation/lists/{Id}/emails/{emailId} | Get Email validation data by email ID. |
| [**getEmailValidationListSummary()**](EmailValidatorApi.md#getEmailValidationListSummary) | **GET** /emailvalidation/lists/{Id} | Get Email validation list details |
| [**getEmailValidationLists()**](EmailValidatorApi.md#getEmailValidationLists) | **GET** /emailvalidation/lists | Get Email validation lists information |
| [**getEmailValidationSubscription()**](EmailValidatorApi.md#getEmailValidationSubscription) | **GET** /emailvalidation/subscription | Get Email Validation subscription |
| [**getValidatedEmailsByList()**](EmailValidatorApi.md#getValidatedEmailsByList) | **GET** /emailvalidation/lists/{Id}/emails | Get Validated Emails by Email Validation List |
| [**uploadEmailValidationFile()**](EmailValidatorApi.md#uploadEmailValidationFile) | **POST** /emailvalidation/upload | Upload file for email validation |
| [**validateEmail()**](EmailValidatorApi.md#validateEmail) | **POST** /emailvalidation/validateEmail | Validate single email address |
| [**validateEmailValidatorList()**](EmailValidatorApi.md#validateEmailValidatorList) | **POST** /emailvalidation/lists/{Id}/validate | Validate list in Email Validator |


## `deleteEmailValidationListById()`

```php
deleteEmailValidationListById($id): \API_TurboSMTP_Invoker\API_TurboSMTP_Model\EmailValidatorListDeleteSuccess
```

Delete email validation list

Delete email validation list

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


$apiInstance = new API_TurboSMTP_Invoker\Api\EmailValidatorApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Id

try {
    $result = $apiInstance->deleteEmailValidationListById($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmailValidatorApi->deleteEmailValidationListById: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| Id | |

### Return type

[**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\EmailValidatorListDeleteSuccess**](../Model/EmailValidatorListDeleteSuccess.md)

### Authorization

[consumerSecret](../../README.md#consumerSecret), [ApiKeyAuth](../../README.md#ApiKeyAuth), [consumerKey](../../README.md#consumerKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `exportCSVValidatedEmailsByList()`

```php
exportCSVValidatedEmailsByList($id): string
```

Export Validated Emails by Email Validation List to CSV File

Export Validated Emails by Email Validation List to CSV File

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


$apiInstance = new API_TurboSMTP_Invoker\Api\EmailValidatorApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Id

try {
    $result = $apiInstance->exportCSVValidatedEmailsByList($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmailValidatorApi->exportCSVValidatedEmailsByList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| Id | |

### Return type

**string**

### Authorization

[consumerSecret](../../README.md#consumerSecret), [ApiKeyAuth](../../README.md#ApiKeyAuth), [consumerKey](../../README.md#consumerKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `text/csv`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getEmailValidationDataByEmailId()`

```php
getEmailValidationDataByEmailId($id, $email_id): \API_TurboSMTP_Invoker\API_TurboSMTP_Model\EmailValidatorListEmailDetails
```

Get Email validation data by email ID.

Get Email validation data by email ID.

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


$apiInstance = new API_TurboSMTP_Invoker\Api\EmailValidatorApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Id
$email_id = 56; // int | Email validation ID obtained from the list.

try {
    $result = $apiInstance->getEmailValidationDataByEmailId($id, $email_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmailValidatorApi->getEmailValidationDataByEmailId: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| Id | |
| **email_id** | **int**| Email validation ID obtained from the list. | |

### Return type

[**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\EmailValidatorListEmailDetails**](../Model/EmailValidatorListEmailDetails.md)

### Authorization

[consumerSecret](../../README.md#consumerSecret), [ApiKeyAuth](../../README.md#ApiKeyAuth), [consumerKey](../../README.md#consumerKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getEmailValidationListSummary()`

```php
getEmailValidationListSummary($id): \API_TurboSMTP_Invoker\API_TurboSMTP_Model\EmailValidatorList
```

Get Email validation list details

Get Email validation list details

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


$apiInstance = new API_TurboSMTP_Invoker\Api\EmailValidatorApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Id

try {
    $result = $apiInstance->getEmailValidationListSummary($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmailValidatorApi->getEmailValidationListSummary: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| Id | |

### Return type

[**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\EmailValidatorList**](../Model/EmailValidatorList.md)

### Authorization

[consumerSecret](../../README.md#consumerSecret), [ApiKeyAuth](../../README.md#ApiKeyAuth), [consumerKey](../../README.md#consumerKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getEmailValidationLists()`

```php
getEmailValidationLists($from, $to, $page, $limit, $tz): \API_TurboSMTP_Invoker\API_TurboSMTP_Model\EmailValidatorSucessResponsetBody
```

Get Email validation lists information

List files for email validation information

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


$apiInstance = new API_TurboSMTP_Invoker\Api\EmailValidatorApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$from = 2020-01-01; // \DateTime | Start date
$to = 2025-12-31; // \DateTime | End date
$page = 1; // int | Page number
$limit = 10; // int | The numbers of rows per page to return
$tz = -07:00; // string | Timezone Offset

try {
    $result = $apiInstance->getEmailValidationLists($from, $to, $page, $limit, $tz);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmailValidatorApi->getEmailValidationLists: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **from** | **\DateTime**| Start date | |
| **to** | **\DateTime**| End date | |
| **page** | **int**| Page number | [optional] [default to 1] |
| **limit** | **int**| The numbers of rows per page to return | [optional] [default to 10] |
| **tz** | **string**| Timezone Offset | [optional] |

### Return type

[**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\EmailValidatorSucessResponsetBody**](../Model/EmailValidatorSucessResponsetBody.md)

### Authorization

[consumerSecret](../../README.md#consumerSecret), [ApiKeyAuth](../../README.md#ApiKeyAuth), [consumerKey](../../README.md#consumerKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getEmailValidationSubscription()`

```php
getEmailValidationSubscription(): \API_TurboSMTP_Invoker\API_TurboSMTP_Model\EmailValidatorSubscription
```

Get Email Validation subscription

This endpoint allows to get details about remaining credit / balance for email validation.

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


$apiInstance = new API_TurboSMTP_Invoker\Api\EmailValidatorApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getEmailValidationSubscription();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmailValidatorApi->getEmailValidationSubscription: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\EmailValidatorSubscription**](../Model/EmailValidatorSubscription.md)

### Authorization

[consumerSecret](../../README.md#consumerSecret), [ApiKeyAuth](../../README.md#ApiKeyAuth), [consumerKey](../../README.md#consumerKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getValidatedEmailsByList()`

```php
getValidatedEmailsByList($id, $page, $limit): \API_TurboSMTP_Invoker\API_TurboSMTP_Model\EmailValidatorValidatedMailsResults
```

Get Validated Emails by Email Validation List

Get Validated Emails by Email Validation List

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


$apiInstance = new API_TurboSMTP_Invoker\Api\EmailValidatorApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Id
$page = 1; // int | Page number
$limit = 10; // int | The numbers of rows per page to return

try {
    $result = $apiInstance->getValidatedEmailsByList($id, $page, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmailValidatorApi->getValidatedEmailsByList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| Id | |
| **page** | **int**| Page number | [optional] [default to 1] |
| **limit** | **int**| The numbers of rows per page to return | [optional] [default to 10] |

### Return type

[**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\EmailValidatorValidatedMailsResults**](../Model/EmailValidatorValidatedMailsResults.md)

### Authorization

[consumerSecret](../../README.md#consumerSecret), [ApiKeyAuth](../../README.md#ApiKeyAuth), [consumerKey](../../README.md#consumerKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `uploadEmailValidationFile()`

```php
uploadEmailValidationFile($file): \API_TurboSMTP_Invoker\API_TurboSMTP_Model\EmailValidationUploadResponse
```

Upload file for email validation

Upload file for email validation

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


$apiInstance = new API_TurboSMTP_Invoker\Api\EmailValidatorApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$file = "/path/to/file.txt"; // \SplFileObject

try {
    $result = $apiInstance->uploadEmailValidationFile($file);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmailValidatorApi->uploadEmailValidationFile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **file** | **\SplFileObject****\SplFileObject**|  | [optional] |

### Return type

[**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\EmailValidationUploadResponse**](../Model/EmailValidationUploadResponse.md)

### Authorization

[consumerSecret](../../README.md#consumerSecret), [ApiKeyAuth](../../README.md#ApiKeyAuth), [consumerKey](../../README.md#consumerKey)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `validateEmail()`

```php
validateEmail($email_address_request_body): \API_TurboSMTP_Invoker\API_TurboSMTP_Model\EmailValidatorMailDetails
```

Validate single email address

Validate singleemail adddress.

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


$apiInstance = new API_TurboSMTP_Invoker\Api\EmailValidatorApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$email_address_request_body = new \API_TurboSMTP_Invoker\API_TurboSMTP_Model\EmailAddressRequestBody(); // \API_TurboSMTP_Invoker\API_TurboSMTP_Model\EmailAddressRequestBody

try {
    $result = $apiInstance->validateEmail($email_address_request_body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmailValidatorApi->validateEmail: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **email_address_request_body** | [**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\EmailAddressRequestBody**](../Model/EmailAddressRequestBody.md)|  | |

### Return type

[**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\EmailValidatorMailDetails**](../Model/EmailValidatorMailDetails.md)

### Authorization

[consumerSecret](../../README.md#consumerSecret), [ApiKeyAuth](../../README.md#ApiKeyAuth), [consumerKey](../../README.md#consumerKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `validateEmailValidatorList()`

```php
validateEmailValidatorList($id)
```

Validate list in Email Validator

Validate list in Email Validator

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


$apiInstance = new API_TurboSMTP_Invoker\Api\EmailValidatorApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Id

try {
    $apiInstance->validateEmailValidatorList($id);
} catch (Exception $e) {
    echo 'Exception when calling EmailValidatorApi->validateEmailValidatorList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| Id | |

### Return type

void (empty response body)

### Authorization

[consumerSecret](../../README.md#consumerSecret), [ApiKeyAuth](../../README.md#ApiKeyAuth), [consumerKey](../../README.md#consumerKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
