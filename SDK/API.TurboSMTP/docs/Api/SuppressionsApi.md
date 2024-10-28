# API_TurboSMTP_Invoker\SuppressionsApi

All URIs are relative to https://pro.api.serversmtp.com/api/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**bulkDeleteSuppressions()**](SuppressionsApi.md#bulkDeleteSuppressions) | **POST** /suppressions/bulk_delete | Bulk delete suppressions |
| [**deleteFilterSuppressions()**](SuppressionsApi.md#deleteFilterSuppressions) | **POST** /suppressions/delete | Delete suppressions |
| [**exportFilterSuppressions()**](SuppressionsApi.md#exportFilterSuppressions) | **POST** /suppressions/csv | Export filtered suppressions |
| [**exportSuppressionsDataCSV()**](SuppressionsApi.md#exportSuppressionsDataCSV) | **GET** /suppressions/csv | Export Suppressions data in CSV file |
| [**filterSuppressions()**](SuppressionsApi.md#filterSuppressions) | **POST** /suppressions | Filter suppressions |
| [**getSuppressions()**](SuppressionsApi.md#getSuppressions) | **GET** /suppressions | Get Suppressions Data |
| [**importSuppressions()**](SuppressionsApi.md#importSuppressions) | **POST** /suppressions/import | Import Suppressions |


## `bulkDeleteSuppressions()`

```php
bulkDeleteSuppressions($request_body): \API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionsDeleteSuccess
```

Bulk delete suppressions

Bulk delete suppressions

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


$apiInstance = new API_TurboSMTP_Invoker\Api\SuppressionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$request_body = array('request_body_example'); // string[]

try {
    $result = $apiInstance->bulkDeleteSuppressions($request_body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SuppressionsApi->bulkDeleteSuppressions: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **request_body** | [**string[]**](../Model/string.md)|  | |

### Return type

[**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionsDeleteSuccess**](../Model/SuppressionsDeleteSuccess.md)

### Authorization

[consumerSecret](../../README.md#consumerSecret), [ApiKeyAuth](../../README.md#ApiKeyAuth), [consumerKey](../../README.md#consumerKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteFilterSuppressions()`

```php
deleteFilterSuppressions($suppression_filter_request_body): \API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionsDeleteSuccess
```

Delete suppressions

Delete suppressions

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


$apiInstance = new API_TurboSMTP_Invoker\Api\SuppressionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$suppression_filter_request_body = new \API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionFilterRequestBody(); // \API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionFilterRequestBody

try {
    $result = $apiInstance->deleteFilterSuppressions($suppression_filter_request_body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SuppressionsApi->deleteFilterSuppressions: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **suppression_filter_request_body** | [**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionFilterRequestBody**](../Model/SuppressionFilterRequestBody.md)|  | |

### Return type

[**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionsDeleteSuccess**](../Model/SuppressionsDeleteSuccess.md)

### Authorization

[consumerSecret](../../README.md#consumerSecret), [ApiKeyAuth](../../README.md#ApiKeyAuth), [consumerKey](../../README.md#consumerKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `exportFilterSuppressions()`

```php
exportFilterSuppressions($suppression_filter_request_body): string
```

Export filtered suppressions

Export Filtered Suppressions

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


$apiInstance = new API_TurboSMTP_Invoker\Api\SuppressionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$suppression_filter_request_body = new \API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionFilterRequestBody(); // \API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionFilterRequestBody

try {
    $result = $apiInstance->exportFilterSuppressions($suppression_filter_request_body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SuppressionsApi->exportFilterSuppressions: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **suppression_filter_request_body** | [**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionFilterRequestBody**](../Model/SuppressionFilterRequestBody.md)|  | |

### Return type

**string**

### Authorization

[consumerSecret](../../README.md#consumerSecret), [ApiKeyAuth](../../README.md#ApiKeyAuth), [consumerKey](../../README.md#consumerKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `text/csv`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `exportSuppressionsDataCSV()`

```php
exportSuppressionsDataCSV($from, $to, $tz, $filter, $filter_by, $smart_search, $orderby, $ordertype): string
```

Export Suppressions data in CSV file

Export Suppressions data in CSV file

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


$apiInstance = new API_TurboSMTP_Invoker\Api\SuppressionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$from = 2020-01-01; // \DateTime | Start date
$to = 2025-12-31; // \DateTime | End date
$tz = -07:00; // string | Timezone Offset
$filter = Jhon.Doe@gmail.com; // string | Text to search (recipient, sender, email subject or reason for suppression)
$filter_by = new \API_TurboSMTP_Invoker\API_TurboSMTP_Model\\API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionSource(); // \API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionSource[]
$smart_search = false; // bool | Smart search
$orderby = new \API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionOrderBy(); // SuppressionOrderBy
$ordertype = new \API_TurboSMTP_Invoker\API_TurboSMTP_Model\OrderType(); // OrderType

try {
    $result = $apiInstance->exportSuppressionsDataCSV($from, $to, $tz, $filter, $filter_by, $smart_search, $orderby, $ordertype);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SuppressionsApi->exportSuppressionsDataCSV: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **from** | **\DateTime**| Start date | |
| **to** | **\DateTime**| End date | |
| **tz** | **string**| Timezone Offset | [optional] |
| **filter** | **string**| Text to search (recipient, sender, email subject or reason for suppression) | [optional] |
| **filter_by** | [**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionSource[]**](../Model/\API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionSource.md)|  | [optional] |
| **smart_search** | **bool**| Smart search | [optional] [default to false] |
| **orderby** | [**SuppressionOrderBy**](../Model/.md)|  | [optional] |
| **ordertype** | [**OrderType**](../Model/.md)|  | [optional] |

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

## `filterSuppressions()`

```php
filterSuppressions($suppression_filter_order_page_request_body): \API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionsSucessResponsetBody
```

Filter suppressions

Get Suppressions Data

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


$apiInstance = new API_TurboSMTP_Invoker\Api\SuppressionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$suppression_filter_order_page_request_body = new \API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionFilterOrderPageRequestBody(); // \API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionFilterOrderPageRequestBody

try {
    $result = $apiInstance->filterSuppressions($suppression_filter_order_page_request_body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SuppressionsApi->filterSuppressions: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **suppression_filter_order_page_request_body** | [**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionFilterOrderPageRequestBody**](../Model/SuppressionFilterOrderPageRequestBody.md)|  | |

### Return type

[**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionsSucessResponsetBody**](../Model/SuppressionsSucessResponsetBody.md)

### Authorization

[consumerSecret](../../README.md#consumerSecret), [ApiKeyAuth](../../README.md#ApiKeyAuth), [consumerKey](../../README.md#consumerKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getSuppressions()`

```php
getSuppressions($from, $to, $page, $limit, $tz, $filter, $filter_by, $smart_search, $orderby, $ordertype): \API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionsSucessResponsetBody
```

Get Suppressions Data

Get Suppressions Data

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


$apiInstance = new API_TurboSMTP_Invoker\Api\SuppressionsApi(
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
$filter = Jhon.Doe@gmail.com; // string | Text to search (recipient, sender, email subject or reason for suppression)
$filter_by = new \API_TurboSMTP_Invoker\API_TurboSMTP_Model\\API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionSource(); // \API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionSource[]
$smart_search = false; // bool | Smart search
$orderby = new \API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionOrderBy(); // SuppressionOrderBy
$ordertype = new \API_TurboSMTP_Invoker\API_TurboSMTP_Model\OrderType(); // OrderType

try {
    $result = $apiInstance->getSuppressions($from, $to, $page, $limit, $tz, $filter, $filter_by, $smart_search, $orderby, $ordertype);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SuppressionsApi->getSuppressions: ', $e->getMessage(), PHP_EOL;
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
| **filter** | **string**| Text to search (recipient, sender, email subject or reason for suppression) | [optional] |
| **filter_by** | [**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionSource[]**](../Model/\API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionSource.md)|  | [optional] |
| **smart_search** | **bool**| Smart search | [optional] [default to false] |
| **orderby** | [**SuppressionOrderBy**](../Model/.md)|  | [optional] |
| **ordertype** | [**OrderType**](../Model/.md)|  | [optional] |

### Return type

[**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionsSucessResponsetBody**](../Model/SuppressionsSucessResponsetBody.md)

### Authorization

[consumerSecret](../../README.md#consumerSecret), [ApiKeyAuth](../../README.md#ApiKeyAuth), [consumerKey](../../README.md#consumerKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `importSuppressions()`

```php
importSuppressions($suppression_import_json): \API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionUploadResponse
```

Import Suppressions

Import Suppressions

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


$apiInstance = new API_TurboSMTP_Invoker\Api\SuppressionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$suppression_import_json = new \API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionImportJson(); // \API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionImportJson

try {
    $result = $apiInstance->importSuppressions($suppression_import_json);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SuppressionsApi->importSuppressions: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **suppression_import_json** | [**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionImportJson**](../Model/SuppressionImportJson.md)|  | |

### Return type

[**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionUploadResponse**](../Model/SuppressionUploadResponse.md)

### Authorization

[consumerSecret](../../README.md#consumerSecret), [ApiKeyAuth](../../README.md#ApiKeyAuth), [consumerKey](../../README.md#consumerKey)

### HTTP request headers

- **Content-Type**: `application/json`, `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
