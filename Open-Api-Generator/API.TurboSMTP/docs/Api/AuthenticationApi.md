# API_TurboSMTP_Invoker\AuthenticationApi

All URIs are relative to https://pro.api.serversmtp.com/api/v2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**authenticationLogin()**](AuthenticationApi.md#authenticationLogin) | **POST** /authorize | Login - Get API Key |
| [**authenticationLogout()**](AuthenticationApi.md#authenticationLogout) | **POST** /deauthorize | Logout - Revoke API Key |
| [**changePassword()**](AuthenticationApi.md#changePassword) | **PUT** /change-password | Change turboSMTP password |
| [**checkValidityTokenResetPassword()**](AuthenticationApi.md#checkValidityTokenResetPassword) | **GET** /forgot-password | Forgot Password - Verify if Secret Passord Recovery token is valid. |
| [**sendSecretTokenResetPassword()**](AuthenticationApi.md#sendSecretTokenResetPassword) | **POST** /forgot-password | Forgot Password - Use in case you don´t remember your turboSMTP password |
| [**updateResetPassword()**](AuthenticationApi.md#updateResetPassword) | **PUT** /forgot-password | Forgot Password - change password |


## `authenticationLogin()`

```php
authenticationLogin($authentication_login_request_body): \API_TurboSMTP_Invoker\API_TurboSMTP_Model\AuthenticationLoginSucessResponsetBody
```

Login - Get API Key

**This endpoint allows you to get an API Key**  By providing your turboSMTP authentication details you will be able to get an API Key.  Use your API Key to consume APIs that require authorization.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new API_TurboSMTP_Invoker\Api\AuthenticationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authentication_login_request_body = new \API_TurboSMTP_Invoker\API_TurboSMTP_Model\AuthenticationLoginRequestBody(); // \API_TurboSMTP_Invoker\API_TurboSMTP_Model\AuthenticationLoginRequestBody

try {
    $result = $apiInstance->authenticationLogin($authentication_login_request_body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AuthenticationApi->authenticationLogin: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **authentication_login_request_body** | [**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\AuthenticationLoginRequestBody**](../Model/AuthenticationLoginRequestBody.md)|  | |

### Return type

[**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\AuthenticationLoginSucessResponsetBody**](../Model/AuthenticationLoginSucessResponsetBody.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `authenticationLogout()`

```php
authenticationLogout(): \API_TurboSMTP_Invoker\API_TurboSMTP_Model\CommonMessageResponseBody
```

Logout - Revoke API Key

**This endpoint allows you to revoke your API Key**

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


$apiInstance = new API_TurboSMTP_Invoker\Api\AuthenticationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->authenticationLogout();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AuthenticationApi->authenticationLogout: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\CommonMessageResponseBody**](../Model/CommonMessageResponseBody.md)

### Authorization

[consumerSecret](../../README.md#consumerSecret), [ApiKeyAuth](../../README.md#ApiKeyAuth), [consumerKey](../../README.md#consumerKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `changePassword()`

```php
changePassword($change_password_request_body): \API_TurboSMTP_Invoker\API_TurboSMTP_Model\CommonSuccessResponseBody
```

Change turboSMTP password

**This endpoint allows you to change your current password**  ## PASSWORD RULES    * Passwords must have at least 10 characters.   * At least one character must be uppercase.   * At least one character must be lowercase.   * At least one character must be numeric.

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


$apiInstance = new API_TurboSMTP_Invoker\Api\AuthenticationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$change_password_request_body = new \API_TurboSMTP_Invoker\API_TurboSMTP_Model\ChangePasswordRequestBody(); // \API_TurboSMTP_Invoker\API_TurboSMTP_Model\ChangePasswordRequestBody

try {
    $result = $apiInstance->changePassword($change_password_request_body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AuthenticationApi->changePassword: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **change_password_request_body** | [**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\ChangePasswordRequestBody**](../Model/ChangePasswordRequestBody.md)|  | |

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

## `checkValidityTokenResetPassword()`

```php
checkValidityTokenResetPassword($token): \API_TurboSMTP_Invoker\API_TurboSMTP_Model\CommonSuccessResponseBody
```

Forgot Password - Verify if Secret Passord Recovery token is valid.

Forgot Password - check if secret token is valid  **Note**: Tokens are valid for 1 hour.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKeyAuth
$config = API_TurboSMTP_Invoker\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = API_TurboSMTP_Invoker\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new API_TurboSMTP_Invoker\Api\AuthenticationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$token = 'token_example'; // string | Secret Token

try {
    $result = $apiInstance->checkValidityTokenResetPassword($token);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AuthenticationApi->checkValidityTokenResetPassword: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **token** | **string**| Secret Token | |

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

## `sendSecretTokenResetPassword()`

```php
sendSecretTokenResetPassword($send_secret_token_reset_password_request_body): \API_TurboSMTP_Invoker\API_TurboSMTP_Model\CommonSuccessResponseBody
```

Forgot Password - Use in case you don´t remember your turboSMTP password

**This endpoint will allow you to get an email that will help you reset your turboSMTP password**  In your password reset email you will find:  * A **Reset Password** button that will take you to the password reset form on turboSMTP website. * A secret token to be used to reset the password via [/authentication/forgot-password](#/authentication/updateResetPassword). **Note**: Token is vaid for 1 hour.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new API_TurboSMTP_Invoker\Api\AuthenticationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$send_secret_token_reset_password_request_body = new \API_TurboSMTP_Invoker\API_TurboSMTP_Model\SendSecretTokenResetPasswordRequestBody(); // \API_TurboSMTP_Invoker\API_TurboSMTP_Model\SendSecretTokenResetPasswordRequestBody

try {
    $result = $apiInstance->sendSecretTokenResetPassword($send_secret_token_reset_password_request_body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AuthenticationApi->sendSecretTokenResetPassword: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **send_secret_token_reset_password_request_body** | [**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\SendSecretTokenResetPasswordRequestBody**](../Model/SendSecretTokenResetPasswordRequestBody.md)|  | |

### Return type

[**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\CommonSuccessResponseBody**](../Model/CommonSuccessResponseBody.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateResetPassword()`

```php
updateResetPassword($update_reset_password_request_body): \API_TurboSMTP_Invoker\API_TurboSMTP_Model\CommonSuccessResponseBody
```

Forgot Password - change password

**This endpoint allows you to reset your password by using a password reset token**  ## PASSWORD RULES    * Passwords must have at least 10 characters.   * At least one character must be uppercase.   * At least one character must be lowercase.   * At least one character must be numeric.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new API_TurboSMTP_Invoker\Api\AuthenticationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$update_reset_password_request_body = new \API_TurboSMTP_Invoker\API_TurboSMTP_Model\UpdateResetPasswordRequestBody(); // \API_TurboSMTP_Invoker\API_TurboSMTP_Model\UpdateResetPasswordRequestBody

try {
    $result = $apiInstance->updateResetPassword($update_reset_password_request_body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AuthenticationApi->updateResetPassword: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **update_reset_password_request_body** | [**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\UpdateResetPasswordRequestBody**](../Model/UpdateResetPasswordRequestBody.md)|  | |

### Return type

[**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\CommonSuccessResponseBody**](../Model/CommonSuccessResponseBody.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
