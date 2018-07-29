<?php

namespace InstagramAPI;

class ExploreResponse extends Response
{
    public $num_results;
    public $auto_load_more_enabled;
    public $items;
    public $more_available;
    public $next_max_id;
    public $max_id;

    public function __construct($response)
    {
        if (self::STATUS_OK == $response['status']) {
            $this->num_results = $response['num_results'];
            $this->auto_load_more_enabled = $response['auto_load_more_enabled'];
            $this->more_available = $response['more_available'];
            $this->next_max_id = isset($response['next_max_id']) ? $response['next_max_id'] : null;
            $this->max_id = $response['max_id'];
            $items = [];
            foreach ($response['items'] as $item) {
                if (isset($item['media'])) {
                    $items[] = new Item($item['media']);
                }
            }
            $this->items = $items;
        } else {
            $this->setMessage($response['message']);
        }
        $this->setStatus($response['status']);
    }

    public function getExpires()
    {
        return $this->expires;
    }

    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @return Item[]
     */
    public function getItems()
    {
        return $this->items;
    }
}
