<?php

namespace lib\items;

use lib\Api;
use lib\ItemCache;

class Machines extends ItemCache
{
    protected $api;

    public function __construct()
    {
        $this->api = new Api();
    }

    protected function getItemsFromPrimaryRepository()
    {
        if ($result = $this->api->command('get', 'machines', [
            'token' => $this->api::API_KEY,
            'size' => 999999,
        ])) {
            return $result['machines'];
        }

        return [];
    }

    public function getUnifiedItems()
    {
        $itemsFiltered = [];

        $items = parent::getItems();

        foreach ($items as $it) {
            if (!in_array($it['model'], $itemsFiltered)) {
                $itemsFiltered[$it['id']] = $it['model'];
            }
        }

        return $itemsFiltered;
    }

    public function getFullInfo($machineId)
    {
        return $this->api->command('get', 'machines/' . $machineId, ['token' => $this->api::API_KEY]);
    }
}
