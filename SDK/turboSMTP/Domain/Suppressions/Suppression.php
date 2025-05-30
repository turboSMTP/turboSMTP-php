<?php

namespace TurboSMTP\Domain\Suppressions;

use DateTime;
use TurboSMTP\Helpers\DateTimeHelper;
use TurboSMTP\Domain\Suppressions\SuppressionSource;

class Suppression
{
    private DateTime $date; 
    private string $sender; 
    private SuppressionSource $source; 
    private string $subject; 
    private string $recipient; 
    private string $reason; 

    // Constructor
    public function __construct(
        DateTime $date, 
        string $sender, 
        SuppressionSource $source, 
        string $subject, 
        string $recipient, 
        string $reason
    ) {
        $this->date = $date;
        $this->sender = $sender;
        $this->source = $source;
        $this->subject = $subject;
        $this->recipient = $recipient;
        $this->reason = $reason;
    }

    // Getters
    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function getSender(): string
    {
        return $this->sender;
    }

    public function getSource(): SuppressionSource
    {
        return $this->source;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function getRecipient(): string
    {
        return $this->recipient;
    }

    public function getReason(): string
    {
        return $this->reason;
    }

    // String representation of the class
    public function __toString(): string
    {
        $sb = "class Suppressions {\n";
        $sb .= "  Date: " . DateTimeHelper::toString($this->getDate()) . "\n";
        $sb .= "  Sender: " . $this->getSender() . "\n";
        $sb .= "  Source: " . $this->getSource()->name . "\n";
        $sb .= "  Subject: " . $this->getSubject() . "\n";
        $sb .= "  Recipient: " . $this->getRecipient() . "\n";
        $sb .= "  Reason: " . $this->getReason() . "\n";
        $sb .= "}\n";
        return $sb;
    }
}