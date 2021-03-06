<?php

namespace InstagramAPI;

class MediaLikersResponse extends Response
{
    public $user_count;
    public $likers;

    public function __construct($response)
    {
        if (self::STATUS_OK == $response['status']) {
            $users = [];
            foreach ($response['users'] as $user) {
                $users[] = new User($user);
            }
            $this->likers = $users;
            $this->user_count = $response['user_count'];
        } else {
            $this->setMessage($response['message']);
        }
        $this->setStatus($response['status']);
    }

    /**
     * @return User
     */
    public function getLikers()
    {
        return $this->likers;
    }

    public function getLikeCounter()
    {
        return $this->user_count;
    }
}
