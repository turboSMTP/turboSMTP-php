<?php

namespace TurboSMTP\Model\EmailValidator;

use DateTime;

class EmailValidatorFilesQueryOptionsBuilder
{
    protected EmailValidatorFilesQueryOptions $options;

    public function __construct()
    {
        $this->options = new EmailValidatorFilesQueryOptions();
    }

    public function setFrom(DateTime $date): self
    {
        $this->options->setFrom($date);
        return $this;
    }

    public function setTo(DateTime $date): self
    {
        $this->options->setTo($date);
        return $this;
    }

    public function setPage(?int $page): self
    {
        $this->options->setPage($page);
        return $this;
    }

    public function setLimit(?int $limit): self
    {
        $this->options->setLimit($limit);
        return $this;
    }    

    private function validate(): void
    {
        if ($this->options->getFrom() === null) {
            throw new \InvalidArgumentException("From parameter is required");
        }
        if ($this->options->getTo() === null) {
            throw new \InvalidArgumentException("To parameter is required");
        }
    }

    public function build(): EmailValidatorFilesQueryOptions
    {
        $this->validate();
        return $this->options;
    }
}