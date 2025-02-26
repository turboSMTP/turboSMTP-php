<?php

namespace TurboSMTP\Helpers;

use DateTime; // Make sure to include the DateTime class
use InvalidArgumentException; // Include for exception handling

class DateTimeHelper
{
    public static function fromTSDatetimes($str)
    {
        $format = 'Y-m-d H:i:s'; // PHP format for "yyyy-MM-dd HH:mm:ss"
        $dateTime = DateTime::createFromFormat($format, $str);

        if ($dateTime === false) {
            // Get the errors from the DateTime parsing
            $errors = DateTime::getLastErrors();
            throw new InvalidArgumentException("Invalid date format, expected $format, value was: $str. Errors: " . implode(", ", $errors['errors']));
        }

        return $dateTime;
    }
}