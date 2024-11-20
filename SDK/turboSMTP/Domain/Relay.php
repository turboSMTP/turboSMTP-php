<?php

namespace TurboSMTP\Domain;

class Relay
{
    private $messageID;
    private $subject;
    private $sender;
    private $recipient;
    private $sendTime;
    private $status; // This will hold RelayStatus or null
    private $domain;
    private $contactDomain;
    private $error;
    private $xCampaignId;

    // Constructor with default values
    public function __construct(
        int $messageID = 0,
        string $subject = null,
        string $sender = null,
        string $recipient = null,
        string $sendTime = null,
        $status = null, // Assuming RelayStatus is defined elsewhere
        string $domain = null,
        string $contactDomain = null,
        string $error = null,
        string $xCampaignId = null
    ) {
        $this->messageID = $messageID;
        $this->subject = $subject;
        $this->sender = $sender;
        $this->recipient = $recipient;
        $this->sendTime = $sendTime;
        $this->status = $status;
        $this->domain = $domain;
        $this->contactDomain = $contactDomain;
        $this->error = $error;
        $this->xCampaignId = $xCampaignId;
    }

    // Getters and Setters
    public function getMessageID(): int
    {
        return $this->messageID;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function getSender(): ?string
    {
        return $this->sender;
    }

    public function getRecipient(): ?string
    {
        return $this->recipient;
    }

    public function getSendTime(): ?string
    {
        return $this->sendTime;
    }

    public function getStatus()
    {
        return $this->status; // Return RelayStatus or null
    }

    public function getDomain(): ?string
    {
        return $this->domain;
    }

    public function getContactDomain(): ?string
    {
        return $this->contactDomain;
    }

    public function getError(): ?string
    {
        return $this->error;
    }

    public function getXCampaignId(): ?string
    {
        return $this->xCampaignId;
    }

    // String representation of the class
    public function __toString(): string
    {
        $sb = "class Relay {\n";
        $sb .= "  MessageID: " . $this->messageID . "\n";
        $sb .= "  Subject: " . $this->subject . "\n";
        $sb .= "  Sender: " . $this->sender . "\n";
        $sb .= "  Recipient: " . $this->recipient . "\n";
        $sb .= "  SendTime: " . $this->sendTime . "\n";
        $sb .= "  Status: " . ($this->status !== null ? $this->status : 'null') . "\n"; // Handle null
        $sb .= "  Domain: " . $this->domain . "\n";
        $sb .= "  ContactDomain: " . $this->contactDomain . "\n";
        $sb .= "  Error: " . $this->error . "\n";
        $sb .= "  XCampaignId: " . $this->xCampaignId . "\n";
        $sb .= "}\n";
        return $sb;
    }
}