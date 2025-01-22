<?php

namespace TurboSMTP\Model\EmailValiator;

use TurboSMTP\Domain\EmailValidator\EmailAddressValidationStatus;
use TurboSMTP\Domain\EmailValidator\EmailAddressValidationSubStatus;

class EmailAddressValidationDetails
{
    private ?EmailAddressValidationStatus $status;
    private ?EmailAddressValidationSubStatus $subStatus;
    private string $email;
    private bool $freeEmail;
    private ?string $domain;
    private ?int $domainAgeDays;
    private ?string $smtpProvider;
    private bool $mxFound;
    private ?string $mxRecord;
    private int $id;

    // Constructor
    public function __construct(
        string $email,
        ?EmailAddressValidationStatus $status = null,
        ?EmailAddressValidationSubStatus $subStatus = null,
        bool $freeEmail = false,
        ?string $domain = null,
        ?int $domainAgeDays = null,
        ?string $smtpProvider = null,
        bool $mxFound = false,
        ?string $mxRecord = null,
        int $id = 0
    ) {
        // Ensure "email" is required (not null)
        if ($email === null) {
            throw new \InvalidArgumentException("email is a required property for EmailValidatorMailDetailsBasic and cannot be null");
        }

        $this->email = $email;
        $this->status = $status;
        $this->subStatus = $subStatus;
        $this->freeEmail = $freeEmail;
        $this->domain = $domain;
        $this->domainAgeDays = $domainAgeDays;
        $this->smtpProvider = $smtpProvider;
        $this->mxFound = $mxFound;
        $this->mxRecord = $mxRecord;
        $this->id = $id;
    }

    // Getter methods
    public function getEmail(): string
    {
        return $this->email;
    }

    public function getStatus(): ?EmailAddressValidationStatus
    {
        return $this->status;
    }

    public function getSubStatus(): ?EmailAddressValidationSubStatus
    {
        return $this->subStatus;
    }

    public function isFreeEmail(): bool
    {
        return $this->freeEmail;
    }

    public function getDomain(): ?string
    {
        return $this->domain;
    }

    public function getDomainAgeDays(): ?int
    {
        return $this->domainAgeDays;
    }

    public function getSmtpProvider(): ?string
    {
        return $this->smtpProvider;
    }

    public function isMxFound(): bool
    {
        return $this->mxFound;
    }

    public function getMxRecord(): ?string
    {
        return $this->mxRecord;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function __toString(): string
    {
        $result = "class EmailValidatorMailDetailsBasic {\n";
        $result .= "  Email: " . $this->email . "\n";
        $result .= "  Status: " . ($this->status !== null ? $this->status->name : 'null') . "\n";
        $result .= "  SubStatus: " . ($this->subStatus !== null ? $this->subStatus->name : 'null') . "\n";
        $result .= "  FreeEmail: " . ($this->freeEmail ? 'true' : 'false') . "\n";
        $result .= "  Domain: " . ($this->domain !== null ? $this->domain : 'null') . "\n";
        $result .= "  DomainAgeDays: " . ($this->domainAgeDays !== null ? $this->domainAgeDays : 'null') . "\n";
        $result .= "  SmtpProvider: " . ($this->smtpProvider !== null ? $this->smtpProvider : 'null') . "\n";
        $result .= "  MxFound: " . ($this->mxFound ? 'true' : 'false') . "\n";
        $result .= "  MxRecord: " . ($this->mxRecord !== null ? $this->mxRecord : 'null') . "\n";
        $result .= "  Id: " . $this->id . "\n";
        $result .= "}\n";
        return $result;
    }
}