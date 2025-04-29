<?php

namespace TurboSMTP\Domain\EmailMessage;

class EmailMessage {
    private string $from;
    private array $to = [];
    private string $subject;
    private array $cc = [];
    private array $bcc = [];
    private string $content;
    private string $htmlContent;
    private array $customHeaders = [];
    private ?string $referenceId = null;
    private ?string $mimeRaw = null; 
    private ?string $campaignID = null; 
    private array $attachments = [];

    public function __construct() { }

    // Public setter methods
    public function setFrom(string $from): void {
        $this->from = $from;
    }

    public function addTo(string $to): void {
        $this->to[] = $to;
    }

    public function setSubject(string $subject): void {
        $this->subject = $subject;
    }

    public function addCc(string $cc): void {
        $this->cc[] = $cc;
    }

    public function addBcc(string $bcc): void {
        $this->bcc[] = $bcc;
    }

    public function setContent(string $content): void {
        $this->content = $content;
    }

    public function setHtmlContent(string $htmlContent): void {
        $this->htmlContent = $htmlContent;
    }

    public function addCustomHeader(string $key, string $value): void {
        $this->customHeaders[$key] = $value;
    }

    public function setReferenceId(?string $referenceId): void {
        $this->referenceId = $referenceId;
    }

    public function setMimeRaw(?string $mimeRaw): void {
        $this->mimeRaw = $mimeRaw;
    }

    public function setCampaignID(?string $campaignID): void {
        $this->campaignID = $campaignID;
    }

    public function addAttachment(string $attachment): void {
        $this->attachments[] = $attachment;
    }

    // Public getter methods
    public function getFrom(): string {
        return $this->from;
    }

    public function getTo(): array {
        return $this->to;
    }

    public function getSubject(): string {
        return $this->subject;
    }

    public function getCc(): array {
        return $this->cc;
    }

    public function getBcc(): array {
        return $this->bcc;
    }

    public function getContent(): string {
        return $this->content;
    }

    public function getHtmlContent(): string {
        return $this->htmlContent;
    }

    public function getCustomHeaders(): array {
        return $this->customHeaders;
    }

    public function getReferenceId(): ?string {
        return $this->referenceId;
    }

    public function getMimeRaw(): ?string {
        return $this->mimeRaw;
    }

    public function getCampaignID(): ?string {
        return $this->campaignID;
    }

    public function getAttachments(): array {
        return $this->attachments;
    }

    public function __toString() : string
    {
        $sb = "class EmailMessage {\n";
        $sb .= "  From: " . $this->from . "\n";
        $sb .= "  To: " . implode(", ", $this->to) . "\n";
        $sb .= "  Subject: " . $this->subject . "\n";
        $sb .= "  Cc: " . implode(", ", $this->cc) . "\n";
        $sb .= "  Bcc: " . implode(", ", $this->bcc) . "\n";
        $sb .= "  Content: " . $this->content . "\n";
        $sb .= "  HtmlContent: " . $this->htmlContent . "\n";
        $sb .= "  CustomHeaders: " . json_encode($this->customHeaders) . "\n";
        $sb .= "  ReferenceId: " . $this->referenceId . "\n";
        $sb .= "  MimeRaw: " . $this->mimeRaw . "\n";
        $sb .= "  CampaignID: " . $this->campaignID . "\n";
        $sb .= "  Attachments: " . implode(", ", $this->attachments) . "\n";
        $sb .= "}\n";
        return $sb;
    }

    // Nested Builder Class
    public static function builder() : EmailMessageBuilder
    {
        return new EmailMessageBuilder();
    }
}