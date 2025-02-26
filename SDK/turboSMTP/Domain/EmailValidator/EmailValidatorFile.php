<?php

namespace TurboSMTP\Domain\EmailValidator;

use TurboSMTP\Helpers\DateTimeHelper;
use InvalidArgumentException; // Include for exception handling

class EmailValidatorFile
{
    // Private properties
    private $id;
    private $creationTime;
    private $fileName;
    private $isProcessed;
    private $percentage;
    private $totalEmails;
    private $totalProcessed;

    // Constructor
    public function __construct($id = 0, $creationTime = "", $fileName = "", $isProcessed = false, $percentage = 0, $totalEmails = 0, $totalProcessed = 0)
    {
        $this->id = $id;
        $this->creationTime = $this->fromTSDatetimes($creationTime);
        $this->fileName = $fileName;
        $this->isProcessed = $isProcessed;
        $this->percentage = $percentage;
        $this->totalEmails = $totalEmails;
        $this->totalProcessed = $totalProcessed;
    }

    // Conversion method (implement based on your requirements)
    private function fromTSDatetimes($creationTime)
    {
        try {
            $date = DateTimeHelper::fromTSDatetimes($creationTime);
            echo $date->format('Y-m-d H:i:s'); 
        } catch (InvalidArgumentException $e) {
            echo $e->getMessage();
        }        
         return $date;
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getCreationTime()
    {
        return $this->creationTime;
    }

    public function getFileName()
    {
        return $this->fileName;
    }

    public function isProcessed()
    {
        return $this->isProcessed;
    }

    public function getPercentage()
    {
        return $this->percentage;
    }

    public function getTotalEmails()
    {
        return $this->totalEmails;
    }

    public function getTotalProcessed()
    {
        return $this->totalProcessed;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setCreationTime($creationTime)
    {
        $this->creationTime = $this->fromTSDatetimes($creationTime);
    }

    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
    }

    public function setIsProcessed($isProcessed)
    {
        $this->isProcessed = $isProcessed;
    }

    public function setPercentage($percentage)
    {
        $this->percentage = $percentage;
    }

    public function setTotalEmails($totalEmails)
    {
        $this->totalEmails = $totalEmails;
    }

    public function setTotalProcessed($totalProcessed)
    {
        $this->totalProcessed = $totalProcessed;
    }

    // Method to return string representation of the object
    public function __toString()
    {
        $sb = "class File {\n";
        $sb .= "  Id: " . $this->getId() . "\n";
        $sb .= "  CreationTime: " . $this->getCreationTime() . "\n";
        $sb .= "  FileName: " . $this->getFileName() . "\n";
        $sb .= "  IsProcessed: " . ($this->isProcessed() ? 'true' : 'false') . "\n";
        $sb .= "  Percentage: " . $this->getPercentage() . "\n";
        $sb .= "  TotalEmails: " . $this->getTotalEmails() . "\n";
        $sb .= "  TotalProcessed: " . $this->getTotalProcessed() . "\n";
        $sb .= "}\n";
        return $sb;
    }
}