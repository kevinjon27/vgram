<?php

namespace InstagramAPI;

class RowItem
{
    public $media_count;
    public $header;
    public $title;
    public $channel_type;
    public $channel_id;
    public $media;

    public function __construct($row_item)
    {
        $this->media_count = $row_item['media_count'];
        $this->header = $row_item['header'];
        $this->title = $row_item['title'];
        $this->channel_type = $row_item['channel_type'];
        $this->channel_id = $row_item['channel_id'];
        $this->media = new Item($row_item['media']);
    }

    public function getMediaCounter()
    {
        return $this->media_count;
    }

    public function getHeader()
    {
        return $this->header;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getChannelType()
    {
        return $this->channel_type;
    }

    public function getChannelId()
    {
        return $this->id;
    }

    public function getMedia()
    {
        return $this->media;
    }
}
