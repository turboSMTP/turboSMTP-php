# API_TurboSMTP_Invoker\SubaccountsApi

All URIs are relative to https://pro.api.serversmtp.com/api/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**checkIfAccountEmailExists()**](SubaccountsApi.md#checkIfAccountEmailExists) | **GET** /subaccounts/email-exists | Check if account email exists in turboSMTP |
| [**createSubaccount()**](SubaccountsApi.md#createSubaccount) | **POST** /subaccounts | Create Subaccount. |
| [**deleteLogoFile()**](SubaccountsApi.md#deleteLogoFile) | **DELETE** /subaccounts/logo | Delete agency logo |
| [**getActivePlan()**](SubaccountsApi.md#getActivePlan) | **GET** /subaccounts/{Id}/active-plan | Get subaccount active plan. |
| [**getAgencySettings()**](SubaccountsApi.md#getAgencySettings) | **GET** /subaccounts/agency | Update Agency details |
| [**getLogoFile()**](SubaccountsApi.md#getLogoFile) | **GET** /subaccounts/logo | Get agency logo |
| [**getSubaccountDetails()**](SubaccountsApi.md#getSubaccountDetails) | **GET** /subaccounts/{Id} | Get sub account details |
| [**getSubaccounts()**](SubaccountsApi.md#getSubaccounts) | **GET** /subaccounts/list | Get Subaccounts lists information |
| [**subaccountAuthenticationLogin()**](SubaccountsApi.md#subaccountAuthenticationLogin) | **POST** /subaccounts/authorize | Login to a subaccount |
| [**updateAgencySettings()**](SubaccountsApi.md#updateAgencySettings) | **PATCH** /subaccounts/agency | Update Agency details |
| [**updateSubaccountDetails()**](SubaccountsApi.md#updateSubaccountDetails) | **PATCH** /subaccounts/{Id} | Update sub account details |
| [**updateSubaccountSMTPLimit()**](SubaccountsApi.md#updateSubaccountSMTPLimit) | **POST** /subaccounts/{Id}/updatesubaccountsmtplimit | Set subaccount smtp limit |
| [**updateSubaccountStatus()**](SubaccountsApi.md#updateSubaccountStatus) | **POST** /subaccounts/{Id}/updatesubaccountstatus | Set subaccount status |
| [**uploadLogoFile()**](SubaccountsApi.md#uploadLogoFile) | **POST** /subaccounts/logo | Upload agency logo |


## `checkIfAccountEmailExists()`

```php
checkIfAccountEmailExists($email): \API_TurboSMTP_Invoker\API_TurboSMTP_Model\CommmonResultResponseBody
```

Check if account email exists in turboSMTP

Check if account email exists in turboSMTP

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


$apiInstance = new API_TurboSMTP_Invoker\Api\SubaccountsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$email = username@gmail.com; // string | Email address.

try {
    $result = $apiInstance->checkIfAccountEmailExists($email);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubaccountsApi->checkIfAccountEmailExists: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **email** | **string**| Email address. | |

### Return type

[**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\CommmonResultResponseBody**](../Model/CommmonResultResponseBody.md)

### Authorization

[consumerSecret](../../README.md#consumerSecret), [ApiKeyAuth](../../README.md#ApiKeyAuth), [consumerKey](../../README.md#consumerKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createSubaccount()`

```php
createSubaccount($subaccount_create_request): \API_TurboSMTP_Invoker\API_TurboSMTP_Model\Subaccount
```

Create Subaccount.

Create subaccount.

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


$apiInstance = new API_TurboSMTP_Invoker\Api\SubaccountsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$subaccount_create_request = new \API_TurboSMTP_Invoker\API_TurboSMTP_Model\SubaccountCreateRequest(); // \API_TurboSMTP_Invoker\API_TurboSMTP_Model\SubaccountCreateRequest

try {
    $result = $apiInstance->createSubaccount($subaccount_create_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubaccountsApi->createSubaccount: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **subaccount_create_request** | [**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\SubaccountCreateRequest**](../Model/SubaccountCreateRequest.md)|  | |

### Return type

[**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\Subaccount**](../Model/Subaccount.md)

### Authorization

[consumerSecret](../../README.md#consumerSecret), [ApiKeyAuth](../../README.md#ApiKeyAuth), [consumerKey](../../README.md#consumerKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteLogoFile()`

```php
deleteLogoFile(): \API_TurboSMTP_Invoker\API_TurboSMTP_Model\CommonSuccessResponseBody
```

Delete agency logo

Delete agency logo

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


$apiInstance = new API_TurboSMTP_Invoker\Api\SubaccountsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->deleteLogoFile();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubaccountsApi->deleteLogoFile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\CommonSuccessResponseBody**](../Model/CommonSuccessResponseBody.md)

### Authorization

[consumerSecret](../../README.md#consumerSecret), [ApiKeyAuth](../../README.md#ApiKeyAuth), [consumerKey](../../README.md#consumerKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getActivePlan()`

```php
getActivePlan($id): \API_TurboSMTP_Invoker\API_TurboSMTP_Model\SubaccountActivePlan
```

Get subaccount active plan.

Get subaccount active plan.

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


$apiInstance = new API_TurboSMTP_Invoker\Api\SubaccountsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Id

try {
    $result = $apiInstance->getActivePlan($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubaccountsApi->getActivePlan: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| Id | |

### Return type

[**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\SubaccountActivePlan**](../Model/SubaccountActivePlan.md)

### Authorization

[consumerSecret](../../README.md#consumerSecret), [ApiKeyAuth](../../README.md#ApiKeyAuth), [consumerKey](../../README.md#consumerKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAgencySettings()`

```php
getAgencySettings(): \API_TurboSMTP_Invoker\API_TurboSMTP_Model\AgencySettings
```

Update Agency details

Get Agency details.

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


$apiInstance = new API_TurboSMTP_Invoker\Api\SubaccountsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getAgencySettings();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubaccountsApi->getAgencySettings: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\AgencySettings**](../Model/AgencySettings.md)

### Authorization

[consumerSecret](../../README.md#consumerSecret), [ApiKeyAuth](../../README.md#ApiKeyAuth), [consumerKey](../../README.md#consumerKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getLogoFile()`

```php
getLogoFile(): \API_TurboSMTP_Invoker\API_TurboSMTP_Model\Logo
```

Get agency logo

Get agency logo

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


$apiInstance = new API_TurboSMTP_Invoker\Api\SubaccountsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getLogoFile();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubaccountsApi->getLogoFile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\Logo**](../Model/Logo.md)

### Authorization

[consumerSecret](../../README.md#consumerSecret), [ApiKeyAuth](../../README.md#ApiKeyAuth), [consumerKey](../../README.md#consumerKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getSubaccountDetails()`

```php
getSubaccountDetails($id): \API_TurboSMTP_Invoker\API_TurboSMTP_Model\Subaccount
```

Get sub account details

Get sub account details.

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


$apiInstance = new API_TurboSMTP_Invoker\Api\SubaccountsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Id

try {
    $result = $apiInstance->getSubaccountDetails($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubaccountsApi->getSubaccountDetails: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| Id | |

### Return type

[**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\Subaccount**](../Model/Subaccount.md)

### Authorization

[consumerSecret](../../README.md#consumerSecret), [ApiKeyAuth](../../README.md#ApiKeyAuth), [consumerKey](../../README.md#consumerKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getSubaccounts()`

```php
getSubaccounts($page, $limit, $filter_by_email, $filter_by_active, $filter_by_ip, $orderby, $ordertype): \API_TurboSMTP_Invoker\API_TurboSMTP_Model\SubAccountListSucessResponsetBody
```

Get Subaccounts lists information

List subaccounts information

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


$apiInstance = new API_TurboSMTP_Invoker\Api\SubaccountsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int | Page number
$limit = 10; // int | The numbers of rows per page to return
$filter_by_email = Jhon; // string | Filter by email addresses that fully/partially match the search value.
$filter_by_active = true; // bool | Filter by subaccount status.
$filter_by_ip = array('filter_by_ip_example'); // string[] | Filter by IP Addresses.
$orderby = email; // string | Field to sort by
$ordertype = new \API_TurboSMTP_Invoker\API_TurboSMTP_Model\OrderType(); // OrderType

try {
    $result = $apiInstance->getSubaccounts($page, $limit, $filter_by_email, $filter_by_active, $filter_by_ip, $orderby, $ordertype);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubaccountsApi->getSubaccounts: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**| Page number | [optional] [default to 1] |
| **limit** | **int**| The numbers of rows per page to return | [optional] [default to 10] |
| **filter_by_email** | **string**| Filter by email addresses that fully/partially match the search value. | [optional] |
| **filter_by_active** | **bool**| Filter by subaccount status. | [optional] |
| **filter_by_ip** | [**string[]**](../Model/string.md)| Filter by IP Addresses. | [optional] |
| **orderby** | **string**| Field to sort by | [optional] [default to &#39;email&#39;] |
| **ordertype** | [**OrderType**](../Model/.md)|  | [optional] |

### Return type

[**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\SubAccountListSucessResponsetBody**](../Model/SubAccountListSucessResponsetBody.md)

### Authorization

[consumerSecret](../../README.md#consumerSecret), [ApiKeyAuth](../../README.md#ApiKeyAuth), [consumerKey](../../README.md#consumerKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `subaccountAuthenticationLogin()`

```php
subaccountAuthenticationLogin($email1): \API_TurboSMTP_Invoker\API_TurboSMTP_Model\AuthenticationLoginSucessResponsetBody
```

Login to a subaccount

Login to a subaccount.

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


$apiInstance = new API_TurboSMTP_Invoker\Api\SubaccountsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$email1 = new \API_TurboSMTP_Invoker\API_TurboSMTP_Model\Email1(); // \API_TurboSMTP_Invoker\API_TurboSMTP_Model\Email1

try {
    $result = $apiInstance->subaccountAuthenticationLogin($email1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubaccountsApi->subaccountAuthenticationLogin: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **email1** | [**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\Email1**](../Model/Email1.md)|  | |

### Return type

[**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\AuthenticationLoginSucessResponsetBody**](../Model/AuthenticationLoginSucessResponsetBody.md)

### Authorization

[consumerSecret](../../README.md#consumerSecret), [ApiKeyAuth](../../README.md#ApiKeyAuth), [consumerKey](../../README.md#consumerKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateAgencySettings()`

```php
updateAgencySettings($base_agency_settings): \API_TurboSMTP_Invoker\API_TurboSMTP_Model\CommonSuccessResponseBody
```

Update Agency details

Update Agency Details

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


$apiInstance = new API_TurboSMTP_Invoker\Api\SubaccountsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$base_agency_settings = new \API_TurboSMTP_Invoker\API_TurboSMTP_Model\BaseAgencySettings(); // \API_TurboSMTP_Invoker\API_TurboSMTP_Model\BaseAgencySettings

try {
    $result = $apiInstance->updateAgencySettings($base_agency_settings);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubaccountsApi->updateAgencySettings: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **base_agency_settings** | [**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\BaseAgencySettings**](../Model/BaseAgencySettings.md)|  | |

### Return type

[**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\CommonSuccessResponseBody**](../Model/CommonSuccessResponseBody.md)

### Authorization

[consumerSecret](../../README.md#consumerSecret), [ApiKeyAuth](../../README.md#ApiKeyAuth), [consumerKey](../../README.md#consumerKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateSubaccountDetails()`

```php
updateSubaccountDetails($id, $subaccount_update_request): \API_TurboSMTP_Invoker\API_TurboSMTP_Model\Subaccount
```

Update sub account details

Update sub account details.

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


$apiInstance = new API_TurboSMTP_Invoker\Api\SubaccountsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Id
$subaccount_update_request = new \API_TurboSMTP_Invoker\API_TurboSMTP_Model\SubaccountUpdateRequest(); // \API_TurboSMTP_Invoker\API_TurboSMTP_Model\SubaccountUpdateRequest

try {
    $result = $apiInstance->updateSubaccountDetails($id, $subaccount_update_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubaccountsApi->updateSubaccountDetails: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| Id | |
| **subaccount_update_request** | [**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\SubaccountUpdateRequest**](../Model/SubaccountUpdateRequest.md)|  | |

### Return type

[**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\Subaccount**](../Model/Subaccount.md)

### Authorization

[consumerSecret](../../README.md#consumerSecret), [ApiKeyAuth](../../README.md#ApiKeyAuth), [consumerKey](../../README.md#consumerKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateSubaccountSMTPLimit()`

```php
updateSubaccountSMTPLimit($id, $subaccount_smtp_limit): \API_TurboSMTP_Invoker\API_TurboSMTP_Model\SubaccountActivePlan
```

Set subaccount smtp limit

Set subaccount smtp limit.

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


$apiInstance = new API_TurboSMTP_Invoker\Api\SubaccountsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Id
$subaccount_smtp_limit = new \API_TurboSMTP_Invoker\API_TurboSMTP_Model\SubaccountSMTPLimit(); // \API_TurboSMTP_Invoker\API_TurboSMTP_Model\SubaccountSMTPLimit

try {
    $result = $apiInstance->updateSubaccountSMTPLimit($id, $subaccount_smtp_limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubaccountsApi->updateSubaccountSMTPLimit: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| Id | |
| **subaccount_smtp_limit** | [**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\SubaccountSMTPLimit**](../Model/SubaccountSMTPLimit.md)|  | |

### Return type

[**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\SubaccountActivePlan**](../Model/SubaccountActivePlan.md)

### Authorization

[consumerSecret](../../README.md#consumerSecret), [ApiKeyAuth](../../README.md#ApiKeyAuth), [consumerKey](../../README.md#consumerKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateSubaccountStatus()`

```php
updateSubaccountStatus($id, $subaccount_active_status): \API_TurboSMTP_Invoker\API_TurboSMTP_Model\SubaccountActivePlan
```

Set subaccount status

Set subaccount status.

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


$apiInstance = new API_TurboSMTP_Invoker\Api\SubaccountsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Id
$subaccount_active_status = new \API_TurboSMTP_Invoker\API_TurboSMTP_Model\SubaccountActiveStatus(); // \API_TurboSMTP_Invoker\API_TurboSMTP_Model\SubaccountActiveStatus

try {
    $result = $apiInstance->updateSubaccountStatus($id, $subaccount_active_status);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubaccountsApi->updateSubaccountStatus: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| Id | |
| **subaccount_active_status** | [**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\SubaccountActiveStatus**](../Model/SubaccountActiveStatus.md)|  | |

### Return type

[**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\SubaccountActivePlan**](../Model/SubaccountActivePlan.md)

### Authorization

[consumerSecret](../../README.md#consumerSecret), [ApiKeyAuth](../../README.md#ApiKeyAuth), [consumerKey](../../README.md#consumerKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `uploadLogoFile()`

```php
uploadLogoFile($file): \API_TurboSMTP_Invoker\API_TurboSMTP_Model\CommonSuccessResponseBody
```

Upload agency logo

Upload agency logo.  Logo must be a png or jpeg image.

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


$apiInstance = new API_TurboSMTP_Invoker\Api\SubaccountsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$file = "/path/to/file.txt"; // \SplFileObject

try {
    $result = $apiInstance->uploadLogoFile($file);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubaccountsApi->uploadLogoFile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **file** | **\SplFileObject****\SplFileObject**|  | [optional] |

### Return type

[**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\CommonSuccessResponseBody**](../Model/CommonSuccessResponseBody.md)

### Authorization

[consumerSecret](../../README.md#consumerSecret), [ApiKeyAuth](../../README.md#ApiKeyAuth), [consumerKey](../../README.md#consumerKey)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
