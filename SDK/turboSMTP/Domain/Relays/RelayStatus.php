<?php

namespace TurboSMTP\Domain\Relays;

enum RelayStatus: int
{
    case NEW = 1;
    case DEFER = 2;
    case SUCCESS = 3;
    case OPEN = 4;
    case CLICK = 5;
    case REPORT = 6;
    case FAIL = 7;
    case SYSFAIL = 8;
    case UNSUB = 9;

    public static function fromString(string $status): ?self
    {
        return match (strtolower($status)) {
            'new' => self::NEW,
            'defer' => self::DEFER,
            'success' => self::SUCCESS,
            'open' => self::OPEN,
            'click' => self::CLICK,
            'report' => self::REPORT,
            'fail' => self::FAIL,
            'sysfail' => self::SYSFAIL,
            'unsub' => self::UNSUB,
            default => null, // Return null for invalid strings
        };
    }   
}