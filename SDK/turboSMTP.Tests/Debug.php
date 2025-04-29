<?php

namespace Debug;

require '../vendor/autoload.php'; // Include Composer's autoloader

// Make sure to include necessary files, adjust paths as needed
//require 'path/to/TurboSMTPClient.php';
//require 'path/to/Export.php'; // Adjust the path according to your project structure
//require 'path/to/other/required/files.php'; // Include other necessary files

use TurboSMTPTests\Relays\Query;
use TurboSMTPTests\Relays\Export;
//use TurboSMTPTests\EmailValidator\ValidateEmailAddress;
//use TurboSMTPTests\EmailValidator\Subscription;
//use TurboSMTPTests\EmailValidator\EmailValidatiorFiles\Add;
//use TurboSMTPTests\EmailValidator\EmailValidatiorFiles\Query;

//use TurboSMTP\APIExtensions\RelaysAPIExtension;
//use TurboSMTPTests\EmailValidator\EmailValidatiorFiles\Get;
//use TurboSMTPTests\EmailValidator\EmailValidatiorFiles\Validate;
//use TurboSMTPTests\EmailValidator\Subscription;
//use TurboSMTPTests\EmailValidator\ValidateEmailAddress;
//use TurboSMTPTests\Suppressions\Delete;
//use TurboSMTPTests\Suppressions\Query;

// Create an instance of the Export class
//$export = new Export('test_query_filtered_by_status',[],'');
//$export->test_query_filtered_by_status();   // Uncomment to call this method

// You can call the methods you want to debug directly
//$export->test_export_with_default_params();

// Or call any other method you wish to debug
//$export->test_query_filtered_by_subject(); // Uncomment to call this method


//$test = new ValidateEmailAddress('test_validate_valid_email_address',[],'');
//$test->test_validate_valid_email_address();

$test = new Query('test_query_with_default_params',[],'');
$test->test_query_with_default_params();

// If you want to stop execution at a certain point, you can use die() or exit()
die("End of script.");