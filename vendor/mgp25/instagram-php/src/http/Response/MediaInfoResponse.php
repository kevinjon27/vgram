<?php

namespace InstagramAPI;

class MediaInfoResponse extends Response
{
    public $taken_at;
    public $image_url;
    public $like_count;
    public $likers;
    public $comments;

    public function __construct($response)
    {
        if (self::STATUS_OK == $response['status']) {
            $this->taken_at = $response['items'][0]['taken_at'];
            $this->image_url = $response['items'][0]['image_versions2']['candidates']['0']['url'];
            $this->like_count = $response['items'][0]['like_count'];
            if (isset($response['items'][0]['likers'])) {
                $likers = [];
                foreach ($response['items'][0]['likers'] as $liker) {
                    $likers[] = new User($liker);
                }
                $this->likers = $likers;
            }
            $comments = [];
            foreach ($response['items'][0]['comments'] as $comment) {
                $comments[] = new Comment($comment);
            }
            $this->comments = $comments;
        } else {
            $this->setMessage($response['message']);
        }
        $this->setStatus($response['status']);
        $this->setFullResponse($response);
    }

    public function getTakenTime()
    {
        return $this->taken_at;
    }

    public function getImageUrl()
    {
        return $this->image_url;
    }

    public function getLikeCount()
    {
        return $this->like_count;
    }

    /**
     * @return User[]
     */
    public function getLikers()
    {
        return $this->likers;
    }

    /**
     * @return Comment
     */
    public function getComments()
    {
        return $this->comments;
    }
}
