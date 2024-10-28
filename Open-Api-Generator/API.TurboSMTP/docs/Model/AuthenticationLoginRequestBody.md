# # AuthenticationLoginRequestBody

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**email** | **string** | The email of turboSMTP account |
**password** | **string** | The password of turboSMTP account |
**no_expire** | **bool** | **false**:  authentication will expire after 2 hours.  **true**:  authentication will keep you signed in, and will never expire. (Use [/authentication/deauthorize](#/authentication/AuthenticationLogout) to logout and release your an API Key) | [optional] [default to false]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
