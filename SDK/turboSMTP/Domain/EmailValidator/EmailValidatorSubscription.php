<?php

namespace TurboSMTP\Domain\EmailValidator;

use DateTime;
use TurboSMTP\Helpers\DateTimeHelper;


class EmailValidatorSubscription
{
    private string $currency;
    private int $freeCredits;
    private int $freeCreditsUsed;
    private ?DateTime $lastUsedPeriod;
    private DateTime $latestPeriodStartDate;
    private DateTime $periodExpirationDate;
    private float $paidCredits;
    private int $remainingFreeCredit;

    public function __construct(
        string $currency = null,
        int $freeCredits = 0,
        int $freeCreditsUsed = 0,
        ?DateTime $lastUsedPeriod = null,
        DateTime $latestPeriodStartDate = null,
        DateTime $periodExpirationDate = null,
        float $paidCredits = 0.0,
        int $remainingFreeCredit = 0
    ) {
        $this->currency = $currency;
        $this->freeCredits = $freeCredits;
        $this->freeCreditsUsed = $freeCreditsUsed;
        $this->lastUsedPeriod = $lastUsedPeriod; 
        $this->latestPeriodStartDate = $latestPeriodStartDate; 
        $this->periodExpirationDate = $periodExpirationDate; 
        $this->paidCredits = $paidCredits;
        $this->remainingFreeCredit = $remainingFreeCredit;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function getFreeCredits(): int
    {
        return $this->freeCredits;
    }

    public function getFreeCreditsUsed(): int
    {
        return $this->freeCreditsUsed;
    }

    public function getLastUsedPeriod(): ?DateTime
    {
        return $this->lastUsedPeriod;
    }

    public function getLatestPeriodStartDate(): DateTime
    {
        return $this->latestPeriodStartDate;
    }

    public function getPeriodExpirationDate(): DateTime
    {
        return $this->periodExpirationDate;
    }

    public function getPaidCredits(): float
    {
        return $this->paidCredits;
    }

    public function getRemainingFreeCredit(): int
    {
        return $this->remainingFreeCredit;
    }

    public function __toString(): string
    {
        $sb = "class EmailValidatorSubscription {\n";
        $sb .= "  Currency: " . $this->getCurrency() . "\n";
        $sb .= "  FreeCredits: " . $this->getFreeCredits() . "\n";
        $sb .= "  FreeCreditsUsed: " . $this->getFreeCreditsUsed() . "\n";
        $sb .= "  LastUsedPeriod: " . ($this->getLastUsedPeriod() ? DateTimeHelper::toString($this->getLastUsedPeriod()) : "null") . "\n";
        $sb .= "  LatestPeriodStartDate: " . DateTimeHelper::toString($this->getLatestPeriodStartDate()) . "\n";
        $sb .= "  PeriodExpirationDate: " . DateTimeHelper::toString($this->getPeriodExpirationDate()) . "\n";
        $sb .= "  PaidCredits: " . $this->getPaidCredits() . "\n";
        $sb .= "  RemainingFreeCredit: " . $this->getRemainingFreeCredit() . "\n";
        $sb .= "}\n";
        return $sb;
    }
}