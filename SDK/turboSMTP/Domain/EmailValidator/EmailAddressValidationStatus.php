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
}