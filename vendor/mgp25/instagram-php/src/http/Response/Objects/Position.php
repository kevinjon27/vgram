<?php

namespace InstagramAPI;

class Position
{
    public $pos1;
    public $pos2;

    public function __construct($data)
    {
        $this->pos1 = $data[0];
        $this->pos2 = $data[1];
    }

    public function getPos1()
    {
        return $this->pos1;
    }

    public function getPos2()
    {
        return $this->pos2;
    }
}
