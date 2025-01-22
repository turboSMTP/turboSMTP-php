<?php

namespace TurboSMTP\Domain\EmailValidator;

enum EmailAddressValidationSubStatus: int
{
    case Empty = 1;
    case AntispamSystem = 2;
    case Greylisted = 3;
    case MailServerTemporaryError = 4;
    case ForcibleDisconnect = 5;
    case MailServerDidNotRespond = 6;
    case TimeoutExceeded = 7;
    case FailedSmtpConnection = 8;
    case MailboxQuotaExceeded = 9;
    case ExceptionOccurred = 10;
    case PossibleTrap = 11;
    case RoleBased = 12;
    case GlobalSuppression = 13;
    case MailboxNotFound = 14;
    case NoDnsEntries = 15;
    case FailedSyntaxCheck = 16;
    case PossibleTypo = 17;
    case UnroutableIpAddress = 18;
    case LeadingPeriodRemoved = 19;
    case DoesNotAcceptMail = 20;
    case AliasAddress = 21;
    case RoleBasedCatchAll = 22;
    case Disposable = 23;
    case Toxic = 24;
}