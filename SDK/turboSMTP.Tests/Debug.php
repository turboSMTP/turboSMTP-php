<?php

namespace Debug;

require '../vendor/autoload.php'; // Include Composer's autoloader

// Make sure to include necessary files, adjust paths as needed
//require 'path/to/TurboSMTPClient.php';
//require 'path/to/Export.php'; // Adjust the path according to your project structure
//require 'path/to/other/required/files.php'; // Include other necessary files

use TurboSMTPTests\Relays\Export;
use TurboSMTPTests\EmailValidator\ValidateEmailAddress;
use TurboSMTPTests\EmailValidator\Subscription;
use TurboSMTPTests\EmailValidator\EmailValidatiorFiles\Add;

// Create an instance of the Export class
//$export = new Export('test_query_filtered_by_status',[],'');
//$export->test_query_filtered_by_status();   // Uncomment to call this method

// You can call the methods you want to debug directly
//$export->test_export_with_default_params();

// Or call any other method you wish to debug
//$export->test_query_filtered_by_subject(); // Uncomment to call this method


//$test = new ValidateEmailAddress('test_validate_valid_email_address',[],'');
//$test->test_validate_valid_email_address();

$test = new Add('test_add_with_2_invalid_addresses',[],'');
$test->test_add_with_2_invalid_addresses();

// If you want to stop execution at a certain point, you can use die() or exit()
die("End of script.");