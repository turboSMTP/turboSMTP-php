<?php

namespace TurboSMTP\Domain\EmailValidator;

use DateTime;
use TurboSMTP\Helpers\DateTimeHelper;

class EmailValidatorFile
{
    // Private properties
    private int $id;
    private DateTime $creationTime;
    private string $fileName;
    private bool $isProcessed;
    private int $percentage;
    private int $totalEmails;
    private int $totalProcessed;

    // Constructor
    public function __construct(int $id = 0, string $creationTime = "", string $fileName = "", bool $isProcessed = false, int $percentage = 0, int $totalEmails = 0, int $totalProcessed = 0)
    {
        $this->id = $id;
        $this->creationTime = DateTimeHelper::fromTSDatetimes($creationTime);
        $this->fileName = $fileName;
        $this->isProcessed = $isProcessed;
        $this->percentage = $percentage;
        $this->totalEmails = $totalEmails;
        $this->totalProcessed = $totalProcessed;
    }

    // Getters
    public function getId(): int
    {
        return $this->id;
    }

    public function getCreationTime(): DateTime
    {
        return $this->creationTime;
    }

    public function getFileName(): string
    {
        return $this->fileName;
    }

    public function isProcessed(): bool
    {
        return $this->isProcessed;
    }

    public function getPercentage(): int
    {
        return $this->percentage;
    }

    public function getTotalEmails(): int
    {
        return $this->totalEmails;
    }

    public function getTotalProcessed(): int
    {
        return $this->totalProcessed;
    }

    // Setters
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setCreationTime(string $creationTime): void
    {
        $this->creationTime = DateTimeHelper::fromTSDatetimes($creationTime);
    }

    public function setFileName(string $fileName): void
    {
        $this->fileName = $fileName;
    }

    public function setIsProcessed(bool $isProcessed): void
    {
        $this->isProcessed = $isProcessed;
    }

    public function setPercentage(int $percentage): void
    {
        $this->percentage = $percentage;
    }

    public function setTotalEmails(int $totalEmails): void
    {
        $this->totalEmails = $totalEmails;
    }

    public function setTotalProcessed(int $totalProcessed): void
    {
        $this->totalProcessed = $totalProcessed;
    }

    // Method to return string representation of the object
    public function __toString(): string
    {
        $sb = "class EmailValidatorFile {\n";
        $sb .= "  Id: " . $this->getId() . "\n";
        $sb .= "  CreationTime: " . $this->getCreationTime() . "\n";
        $sb .= "  FileName: " . $this->getFileName() . "\n";
        $sb .= "  IsProcessed: " . ($this->isProcessed() ? 'true' : 'false') . "\n";
        $sb .= "  Percentage: " . $this->getPercentage() . "\n";
        $sb .= "  TotalEmails: " . $this->getTotalEmails() . "\n";
        $sb .= "  TotalProcessed: " . $this->getTotalProcessed() . "\n";
        $sb .= "}\n";
        return $sb;
    }
}