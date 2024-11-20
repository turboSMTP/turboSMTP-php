<?php

namespace TurboSMTP\Model\Relays;

use TurboSMTP\Model\Shared\RelaysBaseOptions; // Ensure this class exists

class RelaysQueryOptions extends RelaysBaseOptions
{
    private $page;
    private $limit;

    public function getPage(): ?int
    {
        return $this->page;
    }

    public function getLimit(): ?int
    {
        return $this->limit;
    }

    // Builder class for RelaysQueryOptions
    public static function builder(): Builder
    {
        return new Builder();
    }
}