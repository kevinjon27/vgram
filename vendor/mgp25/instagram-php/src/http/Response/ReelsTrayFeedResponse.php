<?php

namespace InstagramAPI;

class ReelsTrayFeedResponse extends Response
{
    public $items;

    public function __construct($response)
    {
        if (self::STATUS_OK == $response['status']) {
            $items = [];
            foreach($response['tray'] as $tray) {
                $items = [];
                if (is_array($tray['items']) || is_object($tray['items']))
                {
                    foreach($tray['items'] as $item) {
                        $this->items[] = new Item($item);
                    }
                }
            }
        } else {
            $this->setMessage($response['message']);
        }
        $this->setStatus($response['status']);
    }

    public function getTrays()
    {
        return $this->items;
    }
}
