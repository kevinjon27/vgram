<?php

namespace InstagramAPI;

class UsertagsResponse extends Response
{
    public $num_results;
    public $auto_load_more_enabled;
    public $items;
    public $more_available;
    public $next_max_id;
    public $total_count;
    public $requires_review;
    public $new_photos;

    public function __construct($response)
    {
        if (self::STATUS_OK == $response['status']) {
            $this->num_results = $response['num_results'];
            $this->auto_load_more_enabled = $response['auto_load_more_enabled'];
            $items = [];
            foreach ($response['items'] as $item) {
                $items[] = new Item($item);
            }
            $this->items = $items;
            $this->more_available = $response['more_available'];
            $this->next_max_id = $response['next_max_id'];
            $this->total_count = $response['total_count'];
            $this->requires_review = $response['requires_review'];
            $this->new_photos = $response['new_photos'];
        } else {
            $this->setMessage($response['message']);
        }
        $this->setStatus($response['status']);
    }

    /**
     * @return mixed
     */
    public function getNumResults()
    {
        return $this->num_results;
    }

    /**
     * @return mixed
     */
    public function getAutoLoadMoreEnabled()
    {
        return $this->auto_load_more_enabled;
    }

    /**
     * @return mixed
     */
    public function getMoreAvailable()
    {
        return $this->more_available;
    }

    /**
     * @return mixed
     */
    public function getNextMaxId()
    {
        return $this->next_max_id;
    }

    /**
     * @return mixed
     */
    public function getTotalCount()
    {
        return $this->total_count;
    }

    /**
     * @return mixed
     */
    public function getRequiresReview()
    {
        return $this->requires_review;
    }

    /**
     * @return mixed
     */
    public function getNewPhotos()
    {
        return $this->new_photos;
    }

    /**
     * @return Item
     */
    public function getItems()
    {
        return $this->items;
    }
}
