<?php

namespace InstagramAPI;

class LoginResponse extends Response
{
    public $username;
    public $has_anonymous_profile_picture;
    public $profile_pic_url;
    public $profile_pic_id;
    public $full_name;
    public $pk;
    public $is_private;

    public function __construct($response)
    {
        if (isset($response['logged_in_user']['username'])) {
            $this->username = $response['logged_in_user']['username'];
            $this->has_anonymous_profile_picture = $response['logged_in_user']['has_anonymous_profile_picture'];
            $this->profile_pic_url = $response['logged_in_user']['profile_pic_url'];
            $this->full_name = $response['logged_in_user']['full_name'];
            $this->pk = $response['logged_in_user']['pk'];
            $this->is_private = $response['logged_in_user']['is_private'];
        } else {
            $this->setMessage($response['message']);
        }
        $this->setStatus($response['status']);
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getHasAnonymousProfilePicture()
    {
        return $this->has_anonymous_profile_picture;
    }

    public function getProfilePicUrl()
    {
        return $this->profile_pic_url;
    }

    public function getProfilePicId()
    {
        return $this->profile_pic_id;
    }

    public function getFullName()
    {
        return $this->full_name;
    }

    public function getUsernameId()
    {
        return $this->pk;
    }

    public function getIsPrivate()
    {
        return $this->is_private;
    }
}
