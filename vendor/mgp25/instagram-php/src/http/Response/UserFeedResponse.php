<?php

namespace InstagramAPI;

class UserFeedResponse extends Response
{
    public $num_results;
    public $auto_load_more_enabled;
    public $items;
    public $more_available;
    public $next_max_id = null;

    public function __construct($response)
    {
        if (self::STATUS_OK == $response['status']) {
            if (array_key_exists('next_max_id', $response)) {
                $this->next_max_id = $response['next_max_id'];
            }
            $this->num_results = $response['num_results'];
            $this->auto_load_more_enabled = $response['auto_load_more_enabled'];
            $items = [];
            foreach ($response['items'] as $item) {
                $items[] = new Item($item);
            }
            $this->items = $items;
            $this->more_available = $response['more_available'];
            $this->setFullResponse($response);
        } else {
            $this->setMessage($response['message']);
        }
        $this->setStatus($response['status']);
    }

    public function getNumResults()
    {
        return $this->num_results;
    }

    public function getAutoLoadMoreEnabled()
    {
        return $this->auto_load_more_enabled;
    }

    /**
     * @return Item[]
     */
    public function getItems()
    {
        return $this->items;
    }

    public function moreAvailable()
    {
        return $this->more_available;
    }

    public function getNextMaxId()
    {
        return $this->next_max_id;
    }
}
