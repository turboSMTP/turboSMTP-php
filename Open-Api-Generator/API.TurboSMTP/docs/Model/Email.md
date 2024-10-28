# # Email

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**from** | **string** | from mail address | [optional]
**to** | **string** | comma-separated recipients emails list | [optional]
**subject** | **string** | email subject | [optional]
**cc** | **string** | comma-separated copy emails list | [optional]
**bcc** | **string** | comma-separated hidden copy emails list | [optional]
**content** | **string** | text content of the email | [optional]
**html_content** | **string** | html content of the email | [optional]
**custom_headers** | **array<string,string>** | email additional headers, use any additional header like standard ones List-Unsubscribe (to allow users to easily unsubscribe), X-Entity-Ref-ID (to handle how gmail and other clients group threads), and your own ones. | [optional]
**reference_id** | **string** | custom argument included within an email to be added to the Event Webhook response. | [optional]
**x_campaign_id** | **string** | custom argument included within an email identify the campaign the email belongs to. | [optional]
**mime_raw** | **string** | mime message which replaces content and hmtl content | [optional]
**attachments** | [**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\Attachment[]**](Attachment.md) | array of attachment objects | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
