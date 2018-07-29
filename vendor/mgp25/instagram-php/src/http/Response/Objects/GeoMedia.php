<?php

namespace InstagramAPI;

class GeoMedia
{
    public $media_id;
    public $display_url;
    public $low_res_url;
    public $lat;
    public $lng;
    public $thumbnail;

    public function __construct($geoMedia)
    {
        $this->media_id = $geoMedia['media_id'];
        $this->display_url = $geoMedia['display_url'];
        $this->low_res_url = $geoMedia['low_res_url'];
        $this->lat = $geoMedia['lat'];
        $this->lng = $geoMedia['lng'];
        $this->thumbnail = $geoMedia['thumbnail'];
    }

    public function getMediaId()
    {
        return $this->media_id;
    }

    public function getDisplayUrl()
    {
        return $this->display_url;
    }

    public function getLowResUrl()
    {
        return $this->low_res_url;
    }

    public function getLatitude()
    {
        return $this->lat;
    }

    public function getLongitude()
    {
        return $this->lng;
    }

    public function getThumbnail()
    {
        return $this->thumbnail;
    }
}
