<?php

namespace lib\items;

use lib\Api;
use lib\ItemCache;

class Tasks extends ItemCache
{
    protected $api;


    public function __construct()
    {
        $this->api = new Api();
    }

    protected function getItemsFromPrimaryRepository()
    {
        return $this->api->command('get', 'tasks', ['token' => $this->api::API_KEY]);
    }

    public function getItems()
    {
        $items = parent::getItems();

        return $items['tasks'] ?? [];
    }

    //public function newItem($machineId, $workerUserId, $timeCreated, $comment = '')
    public function newItem($divisionId, $workerUserId, $timeCreated, $comment = '')
    {
        // Вывести из $divisionId
        $machineId = $divisionId;
    }
}
