<?php

namespace TurboSMTP\Model\Suppressions;

use DateTime;
use TurboSMTP\Model\Shared\OrderType;

class SuppressionsQueryOptionsBuilder
{
    protected SuppressionsQueryOptions $options;

    public function __construct()
    {
        $this->options = new SuppressionsQueryOptions();
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

    public function setOrderBy(SuppressionsOrderBy $orderBy): self
    {
        $this->options->setOrderBy($orderBy);
        return $this;
    }

    public function setOrderType(OrderType $orderType): self
    {
        $this->options->setOrderType($orderType);
        return $this;
    }

    private function validate(): void
    {
        // Example validation logic; customize as needed
        if ($this->options->getFrom() === null && $this->options->getTo() === null) {
            throw new \InvalidArgumentException("At least one of From or To parameters is required");
        }
    }

    public function build(): SuppressionsQueryOptions
    {
        $this->validate();
        return $this->options;
    }
}