<?php

namespace TurboSMTP\Model\Suppressions;

use DateTime;

class SuppressionsDeleteOptionsBuilder
{
    protected SuppressionsDeleteOptions $options;

    public function __construct()
    {
        $this->options = new SuppressionsDeleteOptions();
    }

    public function setFilter(?string $filter): self
    {
        $this->options->setFilter($filter);
        return $this;
    }

    public function setFilterBy(array $filterBy): self
    {
        $this->options->setFilterBy($filterBy);
        return $this;
    }

    public function setSmartSearch(?bool $smartSearch): self
    {
        $this->options->setSmartSearch($smartSearch);
        return $this;
    }

    public function setFrom(?DateTime $from): self
    {
        $this->options->setFrom($from);
        return $this;
    }

    public function setTo(?DateTime $to): self
    {
        $this->options->setTo($to);
        return $this;
    }

    public function setRestrictions(array $restrictions): self
    {
        $this->options->setRestrictions($restrictions);
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

    public function build(): SuppressionsDeleteOptions
    {
        $this->validate();
        return $this->options;
    }
}