<?php

namespace TurboSMTP\Services;

require '../vendor/autoload.php'; // Include Composer autoloader

use API_TurboSMTP_Invoker\API_TurboSMTP_Model\EmailRequestBody;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\Attachment;
use API_TurboSMTP_Invoker\API_TurboSMTP_Model\SendSucessResponsetBody;
use API_TurboSMTP_Invoker\Configuration;
use TurboSMTP\APIExtensions\MailAPIExtension;
use TurboSMTP\Domain\EmailMessage;
use TurboSMTP\Model\Email\SendDetails;
use TurboSMTP\TurboSMTPClientConfiguration;



class EmailMessages extends TurboSMTPService {

    public function __construct(TurboSMTPClientConfiguration $tsClientConfiguration, Configuration $configuration) {
        parent::__construct($tsClientConfiguration);
        $this->api = new MailAPIExtension($this->client, $configuration);
    }

    public function SendAsync(EmailMessage $emailMessage){
        $emailRequestBody = new EmailRequestBody();
        $emailRequestBody->setFrom($emailMessage->getFrom());
        $emailRequestBody->setTo(implode(', ', $emailMessage->getTo()));
        $emailRequestBody->setSubject($emailMessage->getSubject());
        $emailRequestBody->setCc(implode(', ', $emailMessage->getCc()));
        $emailRequestBody->setBcc(implode(', ', $emailMessage->getBcc()));
        $emailRequestBody->setContent($emailMessage->getContent());
        $emailRequestBody->setHtmlContent($emailMessage->getHtmlContent());
        $emailRequestBody->setCustomHeaders($emailMessage->getCustomHeaders());
        $emailRequestBody->setReferenceId($emailMessage->getReferenceId());
        $emailRequestBody->setMimeRaw($emailMessage->getMimeRaw());
        $emailRequestBody->setXCampaignId(($emailMessage->getCampaignID()));
        $emailRequestBody->setAttachments(array_map(function($a) {
            return new Attachment($a->content, $a->name, $a->type);
        }, $emailMessage->getAttachments()));

        $promise = $this->api->sendEmailAsync($emailRequestBody);

        return $promise->then(
            function (SendSucessResponsetBody $response){
                return new SendDetails($response->getMessage(), $response->getMid());
            },
            function ($exception) {
                // Handle the error
                throw new \Exception('Failed to send email: ' . $exception->getMessage());
            }
        );
    }

}
