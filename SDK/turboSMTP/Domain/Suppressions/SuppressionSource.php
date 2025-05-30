<?php

namespace TurboSMTP\Domain\Suppressions;

enum SuppressionSource: int
{
    case manual = 1;
    case bounce = 2;
    case spam = 3;
    case unsubscribe = 4;
    case validationfailed = 5;

    public static function fromString(string $source): ?self
    {
        return match (strtolower($source)) {
            'manual' => self::manual,
            'bounce' => self::bounce,
            'spam' => self::spam,
            'unsubscribe' => self::unsubscribe,
            'validation_faile' => self::validationfailed,
            default => null, // Return null for invalid strings
        };
    }  
}