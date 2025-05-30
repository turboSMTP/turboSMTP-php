<?php

namespace TurboSMTP\Model\Shared;

class PagedListResults
{
    private int $totalRecords;
    private array $records;

    // Constructor
    public function __construct(int $count = 0, array $results = [])
    {
        $this->totalRecords = $count;
        $this->records = $results;
    }

    // Getter for TotalRecords
    public function getTotalRecords(): int
    {
        return $this->totalRecords;
    }

    // Getter for Records
    public function getRecords(): array
    {
        return $this->records;
    }

    // String representation of the class
    public function __toString(): string
    {
        $sb = "class PagedListResults {\n";
        $sb .= "  Count: " . $this->totalRecords . "\n";
        $sb .= "  Results: " . json_encode($this->records) . "\n"; // Encode results as JSON
        $sb .= "}\n";
        return $sb;
    }
}