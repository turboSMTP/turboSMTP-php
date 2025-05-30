<?php

namespace TurboSMTP\Model\Suppressions;

class SuppressionsAddResult
{
    private string $status;
    private array $valid = [];
    private array $invalid = [];   

    // Constructor
    public function __construct(
        string $status,
        array $valid = [],
        array $invalid = []
    ) {
        $this->status = $status;
        $this->valid = $valid;
        $this->invalid = $invalid;
    }

    // Getter methods
    public function getStatus(): string
    {
        return $this->status;
    }

    public function getValid(): array
    {
        return $this->valid;
    }

    public function getInvalid(): array
    {
        return $this->invalid;
    }

    public function __toString(): string
    {
        $result = "class EmailAddressValidatiSuppressionsAddResultonDetails {\n";
        $result .= "  Status: " . $this->status . "\n";
        $result .= "  Valid Emails: " . implode(", ", $this->valid) . "\n";
        $result .= "  Invalid Emails: " . implode(", ", $this->invalid) . "\n";
        $result .= "}\n";
        return $result;
    }
}