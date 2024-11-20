<?php

namespace TurboSMTP\Model\Relays;

use TurboSMTP\Model\Shared\RelaysBaseOptions; // Ensure this class exists

    // Builder nested class
    class Builder{
        public function __construct()
        {
            parent::__construct(new RelaysQueryOptions());
        }

        public function setPage(?int $page): self
        {
            $this->_options->page = $page;
            return $this;
        }

        public function setLimit(?int $limit): self
        {
            $this->_options->limit = $limit;
            return $this;
        }
    }