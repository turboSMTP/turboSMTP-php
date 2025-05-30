<?php

namespace TurboSMTP\Model\Relays;

use DateTime;
use TurboSMTP\Model\Shared\OrderType;

class RelaysExportOptions
{
    private array $relayStatuses;
    private array $filterBy;
    private ?string $filter;
    private ?bool $smartSearch;
    private RelayOrderByOption $orderby;
    private OrderType $ordertype;
    private ?DateTime $from;
    private ?DateTime $to;

    public function __construct()
    {
        $this->relayStatuses = [];
        $this->filterBy = [];
        $this->filter = null;
        $this->smartSearch = null;
        $this->orderby = RelayOrderByOption::send_time;
        $this->ordertype = OrderType::desc;
        $this->from = null;
        $this->to = null;
    }

    // Getter and Setter for relayStatuses
    public function getRelayStatuses(): array
    {
        return $this->relayStatuses;
    }

    public function setRelayStatuses(array $relayStatuses): void
    {
        $this->relayStatuses = $relayStatuses;
    }

    // Getter and Setter for filterBy
    public function getFilterBy(): array
    {
        return $this->filterBy;
    }

    public function setFilterBy(array $filterBy): void
    {
        $this->filterBy = $filterBy;
    }

    // Getter and Setter for filter
    public function getFilter(): ?string
    {
        return $this->filter;
    }

    public function setFilter(?string $filter): void
    {
        $this->filter = $filter;
    }

    // Getter and Setter for smartSearch
    public function getSmartSearch(): ?bool
    {
        return $this->smartSearch;
    }

    public function setSmartSearch(?bool $smartSearch): void
    {
        $this->smartSearch = $smartSearch;
    }

    // Getter and Setter for orderby
    public function getOrderby(): RelayOrderByOption
    {
        return $this->orderby;
    }

    public function setOrderby(RelayOrderByOption $orderby): void
    {
        $this->orderby = $orderby;
    }

    // Getter and Setter for ordertype
    public function getOrdertype(): OrderType
    {
        return $this->ordertype;
    }

    public function setOrdertype(OrderType $ordertype): void
    {
        $this->ordertype = $ordertype;
    }

    // Getter and Setter for from
    public function getFrom(): ?DateTime
    {
        return $this->from;
    }

    public function setFrom(DateTime $from): void
    {
        $this->from = $from;
    }

    // Getter and Setter for to
    public function getTo(): ?DateTime
    {
        return $this->to;
    }

    public function setTo(DateTime $to): void
    {
        $this->to = $to;
    }

    public static function getRelaysExportOptionsBuilder() : RelaysExportOptionsBuilder
    {
        return new RelaysExportOptionsBuilder();
    }

}