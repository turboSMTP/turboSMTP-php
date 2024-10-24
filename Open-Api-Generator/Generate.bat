del api-pubic-resolved.yaml

curl -X "GET" ^
  "https://api.swaggerhub.com/apis/turbo-smtp/public/2.0.0-oas3?resolved=true&flatten=false" ^
  -H "accept: application/yaml" ^
  -H "Authorization: 495b66c6-cfeb-495a-a060-5452fcd17765" >> api-pubic-resolved.yaml

rmdir API.TurboSMTP /S/Q

openapi-generator-cli generate -i api-pubic-resolved.yaml -g php -o API.TurboSMTP --api-package API_TurboSMTP --model-package API_TurboSMTP_Model --invoker-package API_TurboSMTP_Invoker --artifact-id 1 --group-id 1 --additional-properties=apiTests=false

pause