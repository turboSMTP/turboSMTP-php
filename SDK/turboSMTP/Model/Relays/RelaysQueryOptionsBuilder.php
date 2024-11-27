<?php

namespace TurboSMTP\Model\Relays;

use DateTime;
use TurboSMTP\Model\Shared\OrderType;


class RelaysQueryOptionsBuilder
{
    protected RelaysQueryOptions $options;

    public function __construct()
    {
        $this->options = new RelaysQueryOptions();
    }

    public function setRelayStatuses(array $relayStatuses): self
    {
        $this->options->setRelayStatuses($relayStatuses);
        return $this;
    }

    public function setFilterBy(array $filterBy): self
    {
        $this->options->setFilterBy($filterBy);
        return $this;
    }

    public function setFilter(?string $filter): self
    {
        $this->options->setFilter($filter);
        return $this;
    }

    public function setSmartSearch(?bool $smartSearch): self
    {
        $this->options->setSmartSearch($smartSearch);
        return $this;
    }

    public function setOrderBy(RelayOrderByOption $orderBy): self
    {
        $this->options->setOrderBy($orderBy);
        return $this;
    }

    public function setOrderType(OrderType $orderType): self
    {
        $this->options->setOrdertype($orderType);
        return $this;
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

    public function build(): RelaysQueryOptions
    {
        $this->validate();
        return $this->options;
    }
}