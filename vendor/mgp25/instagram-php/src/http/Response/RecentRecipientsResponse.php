<?php

namespace InstagramAPI;

class RecentRecipientsResponse extends Response
{
    public $expiration_interval;
    public $recent_recipients;

    public function __construct($response)
    {
        if (self::STATUS_OK == $response['status']) {
            $this->expiration_interval = $response['expiration_interval'];
            $this->recent_recipients = $response['recent_recipients'];
        } else {
            $this->setMessage($response['message']);
        }
        $this->setStatus($response['status']);
    }

    public function getExpirationInterval()
    {
        return $this->expiration_interval;
    }

    public function getRecentRecipients()
    {
        return $this->recent_recipients;
    }
}
