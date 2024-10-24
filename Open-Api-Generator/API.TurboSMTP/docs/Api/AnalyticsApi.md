# API_TurboSMTP_Invoker\AnalyticsApi

All URIs are relative to https://pro.api.serversmtp.com/api/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**exportAnalyticsDataCSV()**](AnalyticsApi.md#exportAnalyticsDataCSV) | **GET** /analytics/csv | Export Analytics data in CSV file |
| [**getAnalyticsData()**](AnalyticsApi.md#getAnalyticsData) | **GET** /analytics | Get Analytics Data |
| [**getAnalyticsDataByID()**](AnalyticsApi.md#getAnalyticsDataByID) | **GET** /analytics/{Id} | Get Analytics Single Item by ID |


## `exportAnalyticsDataCSV()`

```php
exportAnalyticsDataCSV($from, $to, $status, $filter_by, $filter, $smart_search, $orderby, $ordertype, $tz): string
```

Export Analytics data in CSV file

Export Analytics data in CSV file

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


$apiInstance = new API_TurboSMTP_Invoker\Api\AnalyticsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$from = 2020-01-01; // \DateTime | Start date
$to = 2025-12-31; // \DateTime | End date
$status = array(new \API_TurboSMTP_Invoker\API_TurboSMTP_Model\\API_TurboSMTP_Invoker\API_TurboSMTP_Model\AnalyticMailStatus()); // \API_TurboSMTP_Invoker\API_TurboSMTP_Model\AnalyticMailStatus[] | Filter by Status      NEW: email has been queued for delivery     DEFER: email is in the queue for delivery     SUCCESS: email has been delivered.     OPEN: email has been opened.     CLICK: email has been clicked.     REPORT: email has been reported as spam.     FAIL: email has bounced.     SYSFAIL: email was dropped.     UNSUB: email is unsubscribed.  <br /> Notice that emails that fall into the above statuses can be grouped, ie Turbo-Smtp uses the following groups: <br />      'Clicks' = 'CLICK',     'Unsubscribes' = 'UNSUB',     'Spam' = 'REPORT',     'Drop' = 'SYSFAIL',     'Queued' = 'NEW' or 'DEFER',     'Opens'= 'OPEN' or 'CLICK' or 'UNSUB' or 'REPORT',     'Delivered'= 'SUCCESS'  or 'OPEN' or 'CLICK' or 'UNSUB' or 'REPORT',     'Bounce': 'FAIL'.
$filter_by = new \API_TurboSMTP_Invoker\API_TurboSMTP_Model\\API_TurboSMTP_Invoker\API_TurboSMTP_Model\AnalyticFilterByOption(); // \API_TurboSMTP_Invoker\API_TurboSMTP_Model\AnalyticFilterByOption[] | Filter by
$filter = September 2022; // string | Text to search (recipient, sender, email subject or reason for suppression)
$smart_search = false; // bool | Smart search
$orderby = new \API_TurboSMTP_Invoker\API_TurboSMTP_Model\AnalyticOrderBy(); // AnalyticOrderBy | Order by
$ordertype = new \API_TurboSMTP_Invoker\API_TurboSMTP_Model\OrderType(); // OrderType
$tz = -07:00; // string | Timezone Offset

try {
    $result = $apiInstance->exportAnalyticsDataCSV($from, $to, $status, $filter_by, $filter, $smart_search, $orderby, $ordertype, $tz);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AnalyticsApi->exportAnalyticsDataCSV: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **from** | **\DateTime**| Start date | |
| **to** | **\DateTime**| End date | |
| **status** | [**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\AnalyticMailStatus[]**](../Model/\API_TurboSMTP_Invoker\API_TurboSMTP_Model\AnalyticMailStatus.md)| Filter by Status      NEW: email has been queued for delivery     DEFER: email is in the queue for delivery     SUCCESS: email has been delivered.     OPEN: email has been opened.     CLICK: email has been clicked.     REPORT: email has been reported as spam.     FAIL: email has bounced.     SYSFAIL: email was dropped.     UNSUB: email is unsubscribed.  &lt;br /&gt; Notice that emails that fall into the above statuses can be grouped, ie Turbo-Smtp uses the following groups: &lt;br /&gt;      &#39;Clicks&#39; &#x3D; &#39;CLICK&#39;,     &#39;Unsubscribes&#39; &#x3D; &#39;UNSUB&#39;,     &#39;Spam&#39; &#x3D; &#39;REPORT&#39;,     &#39;Drop&#39; &#x3D; &#39;SYSFAIL&#39;,     &#39;Queued&#39; &#x3D; &#39;NEW&#39; or &#39;DEFER&#39;,     &#39;Opens&#39;&#x3D; &#39;OPEN&#39; or &#39;CLICK&#39; or &#39;UNSUB&#39; or &#39;REPORT&#39;,     &#39;Delivered&#39;&#x3D; &#39;SUCCESS&#39;  or &#39;OPEN&#39; or &#39;CLICK&#39; or &#39;UNSUB&#39; or &#39;REPORT&#39;,     &#39;Bounce&#39;: &#39;FAIL&#39;. | [optional] |
| **filter_by** | [**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\AnalyticFilterByOption[]**](../Model/\API_TurboSMTP_Invoker\API_TurboSMTP_Model\AnalyticFilterByOption.md)| Filter by | [optional] |
| **filter** | **string**| Text to search (recipient, sender, email subject or reason for suppression) | [optional] |
| **smart_search** | **bool**| Smart search | [optional] [default to false] |
| **orderby** | [**AnalyticOrderBy**](../Model/.md)| Order by | [optional] |
| **ordertype** | [**OrderType**](../Model/.md)|  | [optional] |
| **tz** | **string**| Timezone Offset | [optional] |

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

## `getAnalyticsData()`

```php
getAnalyticsData($from, $to, $page, $limit, $status, $filter_by, $filter, $smart_search, $orderby, $ordertype, $tz): \API_TurboSMTP_Invoker\API_TurboSMTP_Model\AnalyticsListSucessResponsetBody
```

Get Analytics Data

Get Analytics Data

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


$apiInstance = new API_TurboSMTP_Invoker\Api\AnalyticsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$from = 2020-01-01; // \DateTime | Start date
$to = 2025-12-31; // \DateTime | End date
$page = 1; // int | Page number
$limit = 10; // int | The numbers of rows per page to return
$status = array(new \API_TurboSMTP_Invoker\API_TurboSMTP_Model\\API_TurboSMTP_Invoker\API_TurboSMTP_Model\AnalyticMailStatus()); // \API_TurboSMTP_Invoker\API_TurboSMTP_Model\AnalyticMailStatus[] | Filter by Status      NEW: email has been queued for delivery     DEFER: email is in the queue for delivery     SUCCESS: email has been delivered.     OPEN: email has been opened.     CLICK: email has been clicked.     REPORT: email has been reported as spam.     FAIL: email has bounced.     SYSFAIL: email was dropped.     UNSUB: email is unsubscribed.  <br /> Notice that emails that fall into the above statuses can be grouped, ie Turbo-Smtp uses the following groups: <br />      'Clicks' = 'CLICK',     'Unsubscribes' = 'UNSUB',     'Spam' = 'REPORT',     'Drop' = 'SYSFAIL',     'Queued' = 'NEW' or 'DEFER',     'Opens'= 'OPEN' or 'CLICK' or 'UNSUB' or 'REPORT',     'Delivered'= 'SUCCESS'  or 'OPEN' or 'CLICK' or 'UNSUB' or 'REPORT',     'Bounce': 'FAIL'.
$filter_by = new \API_TurboSMTP_Invoker\API_TurboSMTP_Model\\API_TurboSMTP_Invoker\API_TurboSMTP_Model\AnalyticFilterByOption(); // \API_TurboSMTP_Invoker\API_TurboSMTP_Model\AnalyticFilterByOption[] | Filter by
$filter = September 2022; // string | Text to search (recipient, sender, email subject or reason for suppression)
$smart_search = false; // bool | Smart search
$orderby = new \API_TurboSMTP_Invoker\API_TurboSMTP_Model\AnalyticOrderBy(); // AnalyticOrderBy | Order by
$ordertype = new \API_TurboSMTP_Invoker\API_TurboSMTP_Model\OrderType(); // OrderType
$tz = -07:00; // string | Timezone Offset

try {
    $result = $apiInstance->getAnalyticsData($from, $to, $page, $limit, $status, $filter_by, $filter, $smart_search, $orderby, $ordertype, $tz);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AnalyticsApi->getAnalyticsData: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **from** | **\DateTime**| Start date | |
| **to** | **\DateTime**| End date | |
| **page** | **int**| Page number | [optional] [default to 1] |
| **limit** | **int**| The numbers of rows per page to return | [optional] [default to 10] |
| **status** | [**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\AnalyticMailStatus[]**](../Model/\API_TurboSMTP_Invoker\API_TurboSMTP_Model\AnalyticMailStatus.md)| Filter by Status      NEW: email has been queued for delivery     DEFER: email is in the queue for delivery     SUCCESS: email has been delivered.     OPEN: email has been opened.     CLICK: email has been clicked.     REPORT: email has been reported as spam.     FAIL: email has bounced.     SYSFAIL: email was dropped.     UNSUB: email is unsubscribed.  &lt;br /&gt; Notice that emails that fall into the above statuses can be grouped, ie Turbo-Smtp uses the following groups: &lt;br /&gt;      &#39;Clicks&#39; &#x3D; &#39;CLICK&#39;,     &#39;Unsubscribes&#39; &#x3D; &#39;UNSUB&#39;,     &#39;Spam&#39; &#x3D; &#39;REPORT&#39;,     &#39;Drop&#39; &#x3D; &#39;SYSFAIL&#39;,     &#39;Queued&#39; &#x3D; &#39;NEW&#39; or &#39;DEFER&#39;,     &#39;Opens&#39;&#x3D; &#39;OPEN&#39; or &#39;CLICK&#39; or &#39;UNSUB&#39; or &#39;REPORT&#39;,     &#39;Delivered&#39;&#x3D; &#39;SUCCESS&#39;  or &#39;OPEN&#39; or &#39;CLICK&#39; or &#39;UNSUB&#39; or &#39;REPORT&#39;,     &#39;Bounce&#39;: &#39;FAIL&#39;. | [optional] |
| **filter_by** | [**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\AnalyticFilterByOption[]**](../Model/\API_TurboSMTP_Invoker\API_TurboSMTP_Model\AnalyticFilterByOption.md)| Filter by | [optional] |
| **filter** | **string**| Text to search (recipient, sender, email subject or reason for suppression) | [optional] |
| **smart_search** | **bool**| Smart search | [optional] [default to false] |
| **orderby** | [**AnalyticOrderBy**](../Model/.md)| Order by | [optional] |
| **ordertype** | [**OrderType**](../Model/.md)|  | [optional] |
| **tz** | **string**| Timezone Offset | [optional] |

### Return type

[**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\AnalyticsListSucessResponsetBody**](../Model/AnalyticsListSucessResponsetBody.md)

### Authorization

[consumerSecret](../../README.md#consumerSecret), [ApiKeyAuth](../../README.md#ApiKeyAuth), [consumerKey](../../README.md#consumerKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAnalyticsDataByID()`

```php
getAnalyticsDataByID($id): \API_TurboSMTP_Invoker\API_TurboSMTP_Model\AnalyticMailItem
```

Get Analytics Single Item by ID

Get Analytics Data by ID

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


$apiInstance = new API_TurboSMTP_Invoker\Api\AnalyticsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Id

try {
    $result = $apiInstance->getAnalyticsDataByID($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AnalyticsApi->getAnalyticsDataByID: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| Id | |

### Return type

[**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\AnalyticMailItem**](../Model/AnalyticMailItem.md)

### Authorization

[consumerSecret](../../README.md#consumerSecret), [ApiKeyAuth](../../README.md#ApiKeyAuth), [consumerKey](../../README.md#consumerKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
