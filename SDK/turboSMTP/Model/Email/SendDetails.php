<?php

namespace TurboSMTP\Model\Email;

class SendDetails
{
    private string $message; 
    private int $messageID; 

    public function __construct(string $message = '', int $mid = 0)
    {
        $this->message = $message;
        $this->messageID = $mid;
    }

    public function getMessage(): string 
    {
        return $this->message;
    }

    public function setMessage(string $message): void 
    {
        $this->message = $message;
    }

    public function getMessageID(): int 
    {
        return $this->messageID;
    }

    public function setMessageID(int $mid): void 
    {
        $this->messageID = $mid;
    }

    /**
     * Returns the string presentation of the object
     * 
     * @return string String presentation of the object
     */
    public function __toString(): string
    {
        return "class SendDetails {\n" .
               "  Message: " . $this->message . "\n" .
               "  MessageID: " . $this->messageID . "\n" .
               "}\n";
    }
}