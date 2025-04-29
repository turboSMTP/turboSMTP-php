<?php

namespace TurboSMTP\Domain\Relays;

class Relay
{
    private int $messageID;
    private string $subject;
    private string $sender;
    private string $recipient;
    private string $sendTime;
    private RelayStatus $status;
    private string $domain;
    private string $recipientDomain;
    private string $error;
    private string $xCampaignId;

    // Constructor with required values
    public function __construct(
        int $messageID,
        string $subject,
        string $sender,
        string $recipient,
        string $sendTime,
        RelayStatus $status,
        string $domain,
        string $recipientDomain,
        string $error,
        string $xCampaignId
    ) {
        $this->messageID = $messageID;
        $this->subject = $subject;
        $this->sender = $sender;
        $this->recipient = $recipient;
        $this->sendTime = $sendTime;
        $this->status = $status;
        $this->domain = $domain;
        $this->recipientDomain = $recipientDomain;
        $this->error = $error;
        $this->xCampaignId = $xCampaignId;
    }

    // Getters
    public function getMessageID(): int
    {
        return $this->messageID;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function getSender(): string
    {
        return $this->sender;
    }

    public function getRecipient(): string
    {
        return $this->recipient;
    }

    public function getSendTime(): string
    {
        return $this->sendTime;
    }

    public function getStatus(): RelayStatus
    {
        return $this->status; 
    }

    public function getDomain(): string
    {
        return $this->domain;
    }

    public function getRecipientDomain(): string
    {
        return $this->recipientDomain;
    }

    public function getError(): string
    {
        return $this->error;
    }

    public function getXCampaignId(): string
    {
        return $this->xCampaignId;
    }

    // Setters
    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }

    public function setSender(string $sender): void
    {
        $this->sender = $sender;
    }

    public function setRecipient(string $recipient): void
    {
        $this->recipient = $recipient;
    }

    public function setSendTime(string $sendTime): void
    {
        $this->sendTime = $sendTime;
    }

    public function setStatus(RelayStatus $status): void
    {
        $this->status = $status;
    }

    public function setDomain(string $domain): void
    {
        $this->domain = $domain;
    }

    public function setRecipientDomain(string $recipientDomain): void
    {
        $this->recipientDomain = $recipientDomain;
    }

    public function setError(string $error): void
    {
        $this->error = $error;
    }

    public function setXCampaignId(string $xCampaignId): void
    {
        $this->xCampaignId = $xCampaignId;
    }

    // String representation of the class
    public function __toString(): string
    {
        $sb = "class Relay {\n";
        $sb .= "  MessageID: " . $this->getMessageID() . "\n";
        $sb .= "  Subject: " . $this->getSubject() . "\n";
        $sb .= "  Sender: " . $this->getSender() . "\n";
        $sb .= "  Recipient: " . $this->getRecipient() . "\n";
        $sb .= "  SendTime: " . $this->getSendTime() . "\n";
        $sb .= "  Status: " . ($this->getStatus() !== null ? $this->getStatus()->name : 'null') . "\n"; // Handle null
        $sb .= "  Domain: " . $this->getDomain() . "\n";
        $sb .= "  RecipientDomain: " . $this->getRecipientDomain() . "\n";
        $sb .= "  Error: " . $this->getError() . "\n";
        $sb .= "  XCampaignId: " . $this->getXCampaignId() . "\n";
        $sb .= "}\n";
        return $sb;
    }
}