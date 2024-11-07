<?php

namespace TurboSMTP\Domain;

class EmailMessage {
    private $from;
    private $to = [];
    private $subject;
    private $cc = [];
    private $bcc = [];
    private $content;
    private $htmlContent;
    private $customHeaders = [];
    private $referenceId;
    private $mimeRaw;
    private $campaignID;
    private $attachments = [];

    private function __construct() { }

    // Public setter methods
    public function setFrom($from) {
        $this->from = $from;
    }

    public function addTo($to) {
        $this->to[] = $to;
    }

    public function setSubject($subject) {
        $this->subject = $subject;
    }

    public function addCc($cc) {
        $this->cc[] = $cc;
    }

    public function addBcc($bcc) {
        $this->bcc[] = $bcc;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function setHtmlContent($htmlContent) {
        $this->htmlContent = $htmlContent;
    }

    public function addCustomHeader($key, $value) {
        $this->customHeaders[$key] = $value;
    }

    public function setReferenceId($referenceId) {
        $this->referenceId = $referenceId;
    }

    public function setMimeRaw($mimeRaw) {
        $this->mimeRaw = $mimeRaw;
    }

    public function setCampaignID($campaignID) {
        $this->campaignID = $campaignID;
    }

    public function addAttachment($attachment) {
        $this->attachments[] = $attachment;
    }

    // Public getter methods
    public function getFrom() {
        return $this->from;
    }

    public function getTo() {
        return $this->to;
    }

    public function getSubject() {
        return $this->subject;
    }

    public function getCc() {
        return $this->cc;
    }

    public function getBcc() {
        return $this->bcc;
    }

    public function getContent() {
        return $this->content;
    }

    public function getHtmlContent() {
        return $this->htmlContent;
    }

    public function getCustomHeaders() {
        return $this->customHeaders;
    }

    public function getReferenceId() {
        return $this->referenceId;
    }

    public function getMimeRaw() {
        return $this->mimeRaw;
    }

    public function getCampaignID() {
        return $this->campaignID;
    }

    public function getAttachments() {
        return $this->attachments;
    }

    public function __toString() {
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
    public static function builder() {
        return new EmailMessageBuilder();
    }
}