# # SuppressionFilterOrderRequestBody

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**from** | **\DateTime** | Start date |
**to** | **\DateTime** | End date |
**tz** | **string** | Timezone Offset | [optional]
**filter** | **string** | Query to search | [optional]
**filter_by** | [**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionSource[]**](SuppressionSource.md) | Filter by | [optional]
**smart_search** | **bool** | Smart search | [optional] [default to false]
**restrict** | [**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionRestriction[]**](SuppressionRestriction.md) | xxxx | [optional]
**orderby** | [**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\SuppressionOrderBy**](SuppressionOrderBy.md) |  | [optional]
**ordertype** | [**\API_TurboSMTP_Invoker\API_TurboSMTP_Model\OrderType**](OrderType.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
