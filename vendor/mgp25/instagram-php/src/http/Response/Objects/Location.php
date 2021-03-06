<?php

namespace InstagramAPI;

class Location
{
    public $name;
    public $external_id_source = null;
    public $address;
    public $lat;
    public $lng;
    public $external_id = null;
    public $city = null;

    public function __construct($location)
    {
        $this->name = $location['name'];
        if (array_key_exists('external_id_source', $location)) {
            $this->external_id_source = $location['external_id_source'];
        }
        if ((isset($location['address'])) && (!empty($location['address']))) {
            $this->address = $location['address'];
        }
        $this->lat = $location['lat'];
        $this->lng = $location['lng'];
        if (array_key_exists('external_id', $location)) {
            $this->external_id = $location['external_id'];
        }
        if (array_key_exists('city', $location)) {
            $this->city = $location['city'];
        }
    }

    public function getName()
    {
        return $this->name;
    }

    public function getExternalIdSource()
    {
        return $this->external_id_source;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getLatitude()
    {
        return $this->lat;
    }

    public function getLongitude()
    {
        return $this->lng;
    }

    public function getExternalId()
    {
        return $this->external_id;
    }

    public function getCity()
    {
        return $this->getCity;
    }
}
