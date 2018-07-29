<?php

namespace InstagramAPI;

class Args
{
    public $media;
    public $links;
    public $text;
    public $profile_id;
    public $profile_image;
    public $timestamp;

    public function __construct($args)
    {
        if (isset($args['media'])) {
            $this->media = [];
            foreach ($args['media'] as $media) {
                $this->media[] = new Media($media);
            }
        }
        $this->links = [];
        foreach ($args['links'] as $link) {
            $this->links[] = new Link($link);
        }
        $this->text = $args['text'];
        $this->profile_id = $args['profile_id'];
        $this->profile_image = $args['profile_image'];
        $this->timestamp = $args['timestamp'];
    }

    public function getMedia()
    {
        return $this->media;
    }

    public function getLinks()
    {
        return $this->links;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getProfileId()
    {
        return $this->profile_id;
    }

    public function getProfileImage()
    {
        return $this->profile_image;
    }

    public function getTimestamp()
    {
        return $this->timestamp;
    }
}
