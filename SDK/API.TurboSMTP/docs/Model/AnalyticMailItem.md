# # AnalyticMailItem

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Email Id. | [optional]
**subject** | **string** | Email Subject. | [optional]
**sender** | **string** | Email Sender. | [optional]
**recipient** | **string** | Email Recipient. | [optional]
**send_time** | **string** | Date Time email was sent. | [optional]
**status** | [**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\AnalyticMailStatus**](AnalyticMailStatus.md) |  | [optional]
**domain** | **string** | The portion of the sender´s email address after the \&quot;@\&quot; symbol. | [optional]
**recipient_domain** | **string** | The portion of the recipient´s email address after the \&quot;@\&quot; symbol. | [optional]
**x_campaign_id** | **string** | Value specified in the x_campaign_id custom header to track campaigns specific data. | [optional]
**error** | **string** | Error returned when delivering the email message. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
