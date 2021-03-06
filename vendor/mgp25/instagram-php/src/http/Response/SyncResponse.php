<?php

namespace InstagramAPI;

class SyncResponse extends Response
{
    public $experiments;

    public function __construct($response)
    {
        if (self::STATUS_OK == $response['status']) {
            $experiments = [];
            foreach ($response['experiments'] as $experiment) {
                $experiments[] = new Experiment($experiment);
            }
            $this->experiments = $experiments;
        } else {
            $this->setMessage($response['message']);
        }
        $this->setStatus($response['status']);
    }

    /**
     * @return Experiment[]
     */
    public function getExperiments()
    {
        return $this->experiments;
    }
}
