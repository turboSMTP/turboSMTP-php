<?php
require 'vendor/autoload.php';

use API_TurboSMTP_Invoker\API_TurboSMTP\MailApi;
use TurboSMTP\APIExtensions\MailAPIExtension;

$mailApi = new MailApi();
var_dump($mailApi);

$mailExtensions = new MailAPIExtension();
var_dump($mailExtensions);
