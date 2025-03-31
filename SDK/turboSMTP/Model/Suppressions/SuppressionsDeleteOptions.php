<?php

namespace TurboSMTP\Model\Suppressions;

use DateTime;

class SuppressionsDeleteOptions
{
    private ?string $filter;
    private array $filterBy;
    private ?bool $smartSearch;
    private ?DateTime $from; // Optional
    private ?DateTime $to;   // Optional
    private array $restrictions;

    public function __construct()
    {
        $this->filter = "";
        $this->filterBy = [];
        $this->smartSearch = false;
        $this->from = null; // Optional initialization
        $this->to = null;   // Optional initialization
        $this->restrictions = [];
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

    public static function getSuppressionsDeleteOptionsBuilder() : SuppressionsDeleteOptionsBuilder
    {
        return new SuppressionsDeleteOptionsBuilder();
    }
}