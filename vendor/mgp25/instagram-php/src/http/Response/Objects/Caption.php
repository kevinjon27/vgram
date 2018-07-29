<?php

namespace InstagramAPI;

class Caption
{
    public $status;
    public $user_id;
    public $created_at_utc;
    public $created_at;
    public $bit_flags;
    public $user;
    public $content_type;
    public $text;
    public $media_id;
    public $pk;
    public $type;

    public function __construct($data)
    {
        $this->status = $data['status'];
        $this->user_id = $data['user_id'];
        $this->created_at_utc = $data['created_at_utc'];
        $this->created_at = $data['created_at'];
        $this->bit_flags = $data['bit_flags'];
        $this->user = new User($data['user']);
        $this->content_type = $data['content_type'];
        $this->text = $data['text'];
        $this->media_id = $data['media_id'];
        $this->pk = $data['pk'];
        $this->type = $data['type'];
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getCreatedAtUtc()
    {
        return $this->created_at_utc;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function getBitFlags()
    {
        return $this->bit_flags;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    public function getContentType()
    {
        return $this->content_type;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getMediaId()
    {
        return $this->media_id;
    }

    public function getUsernameId()
    {
        return $this->pk;
    }

    public function getType()
    {
        return $this->type;
    }
}
