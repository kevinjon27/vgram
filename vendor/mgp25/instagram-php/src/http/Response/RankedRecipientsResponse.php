<?php

namespace InstagramAPI;

class RankedRecipientsResponse extends Response
{
    public $expires;
    public $ranked_recipients;

    public function __construct($response)
    {
        if (self::STATUS_OK == $response['status']) {
            $this->expires = $response['expires'];
            $this->ranked_recipients = $response['ranked_recipients'];
        } else {
            $this->setMessage($response['message']);
        }
        $this->setStatus($response['status']);
    }

    public function getExpires()
    {
        return $this->expires;
    }

    public function getRankedRecipients()
    {
        return $this->ranked_recipients;
    }
}
