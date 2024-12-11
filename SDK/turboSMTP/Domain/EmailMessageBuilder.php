<?php

namespace TurboSMTP\Domain;

class EmailMessageBuilder {
    private $emailMessage;

    public function __construct() {
        $this->emailMessage = new EmailMessage();
    }

    public function setFrom($from) {
        $this->emailMessage->setFrom($from);
        return $this;
    }

    public function addTo($to) {
        $this->emailMessage->addTo($to);
        return $this;
    }

    public function setSubject($subject) {
        $this->emailMessage->setSubject($subject);
        return $this;
    }

    public function addCc($cc) {
        $this->emailMessage->addCc($cc);
        return $this;
    }

    public function addBcc($bcc) {
        $this->emailMessage->addBcc($bcc);
        return $this;
    }

    public function setContent($content) {
        $this->emailMessage->setContent($content);
        return $this;
    }

    public function setHtmlContent($htmlContent) {
        $this->emailMessage->setHtmlContent($htmlContent);
        return $this;
    }

    public function addCustomHeader($key, $value) {
        $this->emailMessage->addCustomHeader($key, $value);
        return $this;
    }

    public function setReferenceId($referenceId) {
        $this->emailMessage->setReferenceId($referenceId);
        return $this;
    }

    public function setMimeRaw($mimeRaw) {
        $this->emailMessage->setMimeRaw($mimeRaw);
        return $this;
    }

    public function setCampaignID($campaignID) {
        $this->emailMessage->setCampaignID($campaignID);
        return $this;
    }

    public function addAttachment($attachment) {
        $this->emailMessage->addAttachment($attachment);
        return $this;
    }

    private function validate() {
        // Perform validation if necessary
    }

    public function build() {
        $this->validate();
        return $this->emailMessage;
    }
}