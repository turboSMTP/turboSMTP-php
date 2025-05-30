<?php

namespace TurboSMTP\Model\EmailValidator;

use DateTime;

class EmailValidatorFilesQueryOptions
{
    private ?DateTime $from;
    private ?DateTime $to;
    private ?int $page;
    private ?int $limit;   

    public function __construct()
    {
        $this->from = null;
        $this->to = null;
        $this->page = null;
        $this->limit = null;
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

    public function getPage(): ?int
    {
        return $this->page;
    }

    public function setPage(?int $page): void
    {
        $this->page = $page;
    } 

    public function getLimit(): ?int
    {
        return $this->limit;
    }

    public function setLimit(?int $limit): void
    {
        $this->limit = $limit;
    }
    
    public static function getEmailValidatorQueryOptionsBuilder() : EmailValidatorFilesQueryOptionsBuilder
    {
        return new EmailValidatorFilesQueryOptionsBuilder();
    }

}