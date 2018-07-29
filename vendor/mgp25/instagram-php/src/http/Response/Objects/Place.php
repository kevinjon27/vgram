<?php

namespace InstagramAPI;

class Place
{
    public $position;
    public $place;

    public function __construct($places)
    {
        $this->position = $places['position'];
        $this->place = new LocationItem($places['place']);
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function getPlace()
    {
        return $this->place;
    }
}
