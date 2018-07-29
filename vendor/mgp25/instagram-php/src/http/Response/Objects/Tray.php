<?php

namespace InstagramAPI;

class Tray
{
    public $items;
    public $user;
    public $can_reply;
    public $expiring_at;

    public function __construct($items, $user, $can_reply, $expiring_at)
    {
        $this->items = $items;
        $this->user = $user;
        $this->can_reply = $can_reply;
        $this->expiring_at = $expiring_at;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function getUsers()
    {
        return $this->users;
    }

    public function canReply()
    {
        return $this->can_reply;
    }

    public function getExpiringAt()
    {
        return $this->expiring_at;
    }
}
