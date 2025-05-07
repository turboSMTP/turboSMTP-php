<?php

namespace Debug;

require '../vendor/autoload.php'; // Include Composer's autoloader

use TurboSMTPTests\Relays\Query;

$test = new Query('test_query_with_default_params',[],'');
$test->test_query_with_default_params();

die("End of script.");