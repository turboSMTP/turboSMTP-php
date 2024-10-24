<?php
require 'vendor/autoload.php';

use API_TurboSMTP_Invoker\API_TurboSMTP\MailApi;

$mailApi = new MailApi();
var_dump($mailApi);