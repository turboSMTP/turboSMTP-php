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

    public static function fromString(string $status): ?self
    {
        return match (strtolower($status)) {
            '' => self::Empty,
            'antispam_system' => self::AntispamSystem,
            'greylisted' => self::Greylisted,
            'mail_server_temporary_error' => self::MailServerTemporaryError,
            'forcible_disconnect' => self::ForcibleDisconnect,
            'mail_server_did_not_respond' => self::MailServerDidNotRespond,
            'timeout_exceeded' => self::TimeoutExceeded,
            'failed_smtp_connection' => self::FailedSmtpConnection,
            'mailbox_quota_exceeded' => self::MailboxQuotaExceeded,
            'exception_occurred' => self::ExceptionOccurred,
            'possible_trap' => self::PossibleTrap,
            'role_based' => self::RoleBased,
            'global_suppression' => self::GlobalSuppression,
            'mailbox_not_found' => self::MailboxNotFound,
            'no_dns_entries' => self::NoDnsEntries,
            'failed_syntax_check' => self::FailedSyntaxCheck,
            'possible_typo' => self::PossibleTypo,
            'unroutable_ip_address' => self::UnroutableIpAddress,
            'leading_period_removed' => self::LeadingPeriodRemoved,
            'does_not_accept_mail' => self::DoesNotAcceptMail,
            'alias_address' => self::AliasAddress,
            'role_based_catch_all' => self::RoleBasedCatchAll,
            'disposable' => self::Disposable,
            'toxic' => self::Toxic,
            default => null, // Return null for invalid strings
        };
    }    
}