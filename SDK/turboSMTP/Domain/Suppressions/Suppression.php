<?php

namespace TurboSMTP\Domain\Suppressions;

use TurboSMTP\Domain\Suppressions\SuppressionSource;

class Suppression
{
    private \DateTime $date; 
    private string $sender; 
    private SuppressionSource $source; 
    private string $subject; 
    private string $recipient; 
    private string $reason; 

    // Constructor
    public function __construct(
        \DateTime $date, 
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
    public function getDate(): \DateTime
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
        return sprintf(
            "class Suppressions {\n" .
            "  Date: %s\n" .
            "  Sender: %s\n" .
            "  Source: %s\n" .
            "  Subject: %s\n" .
            "  Recipient: %s\n" .
            "  Reason: %s\n" .
            "}\n",
            $this->date->format('Y-m-d H:i:s'), // Format DateTime
            $this->sender,
            $this->source->name, // Access enum name
            $this->subject,
            $this->recipient,
            $this->reason
        );
    }
}