<?php

namespace InstagramAPI;

class Param
{
    public $name;
    public $value;

    public function __construct($data)
    {
        $this->name = $data['name'];
        $this->value = $data['value'];
    }

    public function getName()
    {
        return $this->name;
    }

    public function getValue()
    {
        return $this->value;
    }
}
