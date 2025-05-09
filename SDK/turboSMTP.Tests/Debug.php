<?php

namespace Debug;

require '../vendor/autoload.php'; // Include Composer's autoloader

use TurboSMTPTests\Relays\Export;

$test = new Export('test_query_filtered_by_status',[],'');
$test->test_query_filtered_by_status();

die("End of script.");