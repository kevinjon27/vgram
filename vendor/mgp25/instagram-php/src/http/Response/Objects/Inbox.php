<?php

namespace InstagramAPI;

class Inbox
{
    public $unseen_count;
    public $has_older;
    public $unseen_count_ts;
    public $threads;

    public function __construct($data)
    {
        $this->unseen_count = $data['unseen_count'];
        $this->has_older = $data['has_older'];
        $this->unseen_count_ts = $data['unseen_count_ts'];
        $this->threads = $data['threads'];
    }

    public function getUnseenCount()
    {
        return $this->unseen_count;
    }

    public function hasOlder()
    {
        return $this->has_older;
    }

    public function getUnseenCountTs()
    {
        return $this->unseen_count_ts;
    }

    public function getThreads()
    {
        return $this->threads;
    }
}
