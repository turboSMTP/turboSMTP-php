<?php

namespace TurboSMTP\Domain\EmailValidator;

enum EmailAddressValidationStatus: int
{
    case Valid = 1;
    case Invalid = 2;
    case CatchAll = 3;
    case Unknown = 4;
    case Spamtrap = 5;
    case Abuse = 6;
    case DoNotMail = 7;

    public static function fromString(string $status): ?self
    {
        return match (strtolower($status)) {
            'valid' => self::Valid,
            'invalid' => self::Invalid,
            'catch-all' => self::CatchAll,
            'unknown' => self::Unknown,
            'spamtrap' => self::Spamtrap,
            'abuse' => self::Abuse,
            'do_not_mail' => self::DoNotMail,
            default => null, // Return null for invalid strings
        };
    }
}