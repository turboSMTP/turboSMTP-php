<?php

namespace TurboSMTP\Domain;

use DateTime;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\Currency;


class EmailValidatorSubscription
{
    private $currency;
    private $freeCredits;
    private $freeCreditsUsed;
    private $lastUsedPeriod;
    private $latestPeriodStartDate;
    private $periodExpirationDate;
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
        $this->lastUsedPeriod = $lastUsedPeriod; // Assuming conversion methods are handled outside.
        $this->latestPeriodStartDate = $latestPeriodStartDate; // Assuming conversion methods are handled outside.
        $this->periodExpirationDate = $periodExpirationDate; // Assuming conversion methods are handled outside.
        $this->paidCredits = $paidCredits;
        $this->remainingFreeCredit = $remainingFreeCredit;
    }

    public function getCurrency(): ?Currency
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
        $sb .= "  Currency: " . $this->currency . "\n";
        $sb .= "  FreeCredits: " . $this->freeCredits . "\n";
        $sb .= "  FreeCreditsUsed: " . $this->freeCreditsUsed . "\n";
        $sb .= "  LastUsedPeriod: " . ($this->lastUsedPeriod ? $this->lastUsedPeriod->format('Y-m-d H:i:s') : "null") . "\n";
        $sb .= "  LatestPeriodStartDate: " . $this->latestPeriodStartDate->format('Y-m-d H:i:s') . "\n";
        $sb .= "  PeriodExpirationDate: " . $this->periodExpirationDate->format('Y-m-d H:i:s') . "\n";
        $sb .= "  PaidCredits: " . $this->paidCredits . "\n";
        $sb .= "  RemainingFreeCredit: " . $this->remainingFreeCredit . "\n";
        $sb .= "}\n";
        return $sb;
    }
}