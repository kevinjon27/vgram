<?php

namespace InstagramAPI;

class Users
{
    public $position;
    public $user;

    public function __construct($users)
    {
        $this->position = $users['position'];
        $this->user = new User($users['user']);
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function getUser()
    {
        return $this->user;
    }
}
