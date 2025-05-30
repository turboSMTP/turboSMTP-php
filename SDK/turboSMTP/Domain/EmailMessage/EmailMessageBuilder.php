<?php

namespace TurboSMTP\Domain\EmailMessage;

use TurboSMTP\Domain\EmailMessage\EmailMessage;

class EmailMessageBuilder {
    private EmailMessage $emailMessage;

    public function __construct() {
        $this->emailMessage = new EmailMessage();
    }

    public function setFrom(string $from): self {
        $this->emailMessage->setFrom($from);
        return $this;
    }

    public function addTo(string $to): self {
        $this->emailMessage->addTo($to);
        return $this;
    }

    public function setSubject(string $subject): self {
        $this->emailMessage->setSubject($subject);
        return $this;
    }

    public function addCc(string $cc): self {
        $this->emailMessage->addCc($cc);
        return $this;
    }

    public function addBcc(string $bcc): self {
        $this->emailMessage->addBcc($bcc);
        return $this;
    }

    public function setContent(string $content): self {
        $this->emailMessage->setContent($content);
        return $this;
    }

    public function setHtmlContent(string $htmlContent): self {
        $this->emailMessage->setHtmlContent($htmlContent);
        return $this;
    }

    public function addCustomHeader(string $key, string $value): self {
        $this->emailMessage->addCustomHeader($key, $value);
        return $this;
    }

    public function setReferenceId(?string $referenceId): self {
        $this->emailMessage->setReferenceId($referenceId);
        return $this;
    }

    public function setMimeRaw(?string $mimeRaw): self {
        $this->emailMessage->setMimeRaw($mimeRaw);
        return $this;
    }

    public function setCampaignID(?string $campaignID): self {
        $this->emailMessage->setCampaignID($campaignID);
        return $this;
    }

    public function addAttachment(string $attachment): self {
        $this->emailMessage->addAttachment($attachment);
        return $this;
    }

    private function validate(): void {
        // Perform validation if necessary
    }

    public function build(): EmailMessage {
        $this->validate();
        return $this->emailMessage;
    }
}