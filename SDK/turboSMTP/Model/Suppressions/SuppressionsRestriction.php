<?php

namespace TurboSMTP\Model\Suppressions;

use TurboSMTP\Model\Suppressions\SuppressionsRestrictionOperator;
use TurboSMTP\Domain\Suppressions\SuppresionsRestrictionFilterBy;


class SuppressionsRestriction
{
    private SuppresionsRestrictionFilterBy $by; // Enum for filter type
    private SuppressionsRestrictionOperator $operator; // Enum for operator type
    private string $filter; // Filter string
    private bool $smartSearch; // Smart search flag

    // Constructor
    public function __construct(
        SuppresionsRestrictionFilterBy $by,
        SuppressionsRestrictionOperator $operator,
        string $filter,
        bool $smartSearch = false // Default to false if not provided
    ) {
        $this->by = $by;
        $this->operator = $operator;
        $this->filter = $filter;
        $this->smartSearch = $smartSearch;
    }

    // Getter methods
    public function getBy(): SuppresionsRestrictionFilterBy
    {
        return $this->by;
    }

    public function getOperator(): SuppressionsRestrictionOperator
    {
        return $this->operator;
    }

    public function getFilter(): string
    {
        return $this->filter;
    }

    public function getSmartSearch(): bool
    {
        return $this->smartSearch;
    }

    public function __toString(): string
    {
        $result = "class SuppressionsRestriction {\n";
        $result .= "  By: " . $this->by->name . "\n"; // Assuming enum has a name property
        $result .= "  Operator: " . $this->operator->name . "\n"; // Assuming enum has a name property
        $result .= "  Filter: " . $this->filter . "\n";
        $result .= "  SmartSearch: " . ($this->smartSearch ? 'true' : 'false') . "\n";
        $result .= "}\n";
        return $result;
    }
}