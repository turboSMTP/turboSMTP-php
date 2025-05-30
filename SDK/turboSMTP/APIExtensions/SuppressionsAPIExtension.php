<?php

namespace TurboSMTP\APIExtensions;

use API_TurboSMTP_Invoker\API_TurboSMTP\SuppressionsApi;

class SuppressionsAPIExtension extends SuppressionsApi {
    protected function getHostSettingsForsendEmail(): array {
        return [
            [
                "url" => "https://api.turbo-smtp.com/api/v2",
                "description" => "SMTP Server for NON European Users",
            ],
            [
                "url" => "https://api.eu.turbo-smtp.com/api/v2",
                "description" => "SMTP Server for European Users",
            ]
        ];
    }
}