<?php

namespace InstagramAPI;

class MegaphoneLogResponse extends Response
{
    public $success;

    public function __construct($response)
    {
        if (self::STATUS_OK == $response['status']) {
            $this->success = $response['success'];
        } else {
            $this->setMessage($response['message']);
        }
        $this->setStatus($response['status']);
    }

    public function isSuccess()
    {
        return $this->success;
    }
}
