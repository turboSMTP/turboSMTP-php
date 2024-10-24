<?php

// app.php

// Check if the correct number of arguments are passed
if ($argc < 2) {
    echo "Usage: php app.php <name>\n";
    exit(1); // Exit with an error code
}

// Get the name from command line arguments
$name = $argv[1];

// Greeting message
echo "Hello, $name! Welcome to My Console Application.\n";