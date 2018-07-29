<?php

namespace InstagramAPI;

class LocationItem
{
    public $media_bundles;
    public $subtitle;
    public $location;
    public $title;

    public function __construct($locationItem)
    {
        $this->media_bundles = $locationItem['media_bundles'];
        $this->subtitle = $locationItem['subtitle'];
        $this->location = new Location($locationItem['location']);
        $this->title = $locationItem['title'];
    }

    public function getMediaBundles()
    {
        return $this->media_bundles;
    }

    public function getSubtitle()
    {
        return $this->subtitle;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function getTitle()
    {
        return $this->title;
    }
}
