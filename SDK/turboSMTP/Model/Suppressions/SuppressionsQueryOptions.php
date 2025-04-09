<?php

namespace TurboSMTP\Model\Suppressions;

use DateTime;
use TurboSMTP\Model\Shared\OrderType;

class SuppressionsQueryOptions
{
    private ?string $filter;
    private array $filterBy;
    private ?bool $smartSearch;
    private ?DateTime $from; // Optional
    private ?DateTime $to;   // Optional
    private array $restrictions;
    
    private ?int $page;
    private ?int $limit;
    private SuppressionsOrderBy $orderBy;
    private OrderType $orderType;

    public function __construct()
    {
        $this->filter = "";
        $this->filterBy = [];
        $this->smartSearch = false;
        $this->from = null; // Nullable initialization
        $this->to = null;   // Nullable initialization
        $this->restrictions = [];

        $this->page = null; // Nullable initialization
        $this->limit = null; // Nullable initialization
        $this->orderBy = SuppressionsOrderBy::date; // Initialized to date
        $this->orderType = OrderType::desc; // Initialized to desc
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

    // Getter and Setter for filterBy
    public function getFilterBy(): array
    {
        return $this->filterBy;
    }

    public function setFilterBy(array $filterBy): void
    {
        $this->filterBy = $filterBy;
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

    // Getter for from
    public function getFrom(): ?DateTime
    {
        return $this->from;
    }

    // Setter for from
    public function setFrom(?DateTime $from): void
    {
        $this->from = $from;
    }

    // Getter for to
    public function getTo(): ?DateTime
    {
        return $this->to;
    }

    // Setter for to
    public function setTo(?DateTime $to): void
    {
        $this->to = $to;
    }

    // Getter and Setter for restrictions
    public function getRestrictions(): array
    {
        return $this->restrictions;
    }

    public function setRestrictions(array $restrictions): void
    {
        $this->restrictions = $restrictions;
    }

    // Getter and Setter for page
    public function getPage(): ?int
    {
        return $this->page;
    }

    public function setPage(?int $page): void
    {
        $this->page = $page;
    }

    // Getter and Setter for limit
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    public function setLimit(?int $limit): void
    {
        $this->limit = $limit;
    }

    // Getter and Setter for orderBy
    public function getOrderBy(): SuppressionsOrderBy
    {
        return $this->orderBy;
    }

    public function setOrderBy(SuppressionsOrderBy $orderBy): void
    {
        $this->orderBy = $orderBy;
    }

    // Getter and Setter for orderType
    public function getOrderType(): OrderType
    {
        return $this->orderType;
    }

    public function setOrderType(OrderType $orderType): void
    {
        $this->orderType = $orderType;
    }

    public static function getSuppressionsQueryOptionsBuilder(): SuppressionsQueryOptionsBuilder
    {
        return new SuppressionsQueryOptionsBuilder();
    }
}