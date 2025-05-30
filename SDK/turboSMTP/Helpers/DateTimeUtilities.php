<?php

namespace TurboSMTP\Helpers;

use DateTime;
use InvalidArgumentException; 

class DateTimeHelper
{
    public static function fromTSDatetimes(string $str): DateTime
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

    public static function toString(DateTime $value): string
    {
        return $value->format('Y-m-d H:i:s');
    }

    public static function toShortString(DateTime $value): string
    {
        return $value->format('Y-m-d');
    }    
}