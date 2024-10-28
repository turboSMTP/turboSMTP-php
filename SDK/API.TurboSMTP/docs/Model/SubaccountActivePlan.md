# # SubaccountActivePlan

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**ip** | **string** | IP address to use for sending emails. | [optional]
**active** | **bool** | Active subaccounts can be used for login purpose, while users can´t login to inactive subaccounts. Notice that in order to be able to send emails the subaccount subscription must also be active. User can set subaccounts to active / inactive from the dashboard. |
**subaccount_id** | **int** | Sub account Id | [optional]
**parent_id** | **int** | Sub account parent Id | [optional]
**limit** | **int** | The ammount of emails the sub account is allowed to send over the period specified by plan_limit_interval. Value -1 means no limit. |
**sent** | **int** | The ammount of sent emails from the sub account over the current period. | [optional]
**last_used** | **string** | The date time the sub account was last used. | [optional]
**plan_expiration** | **string** | Expiration date time of the plan. | [optional]
**plan_limit_interval** | [**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\SmtpLimitInterval**](SmtpLimitInterval.md) |  | [optional]
**expired** | **bool** | Expired if plan expiration date is overdue. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
