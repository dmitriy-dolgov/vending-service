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
        // здесь не надо делать 'size' => 999999, чтобы вернуть записей больше чем 20, но проследить на будущее если что
        return $this->api->command('get', 'machines', ['token' => $this->api::API_KEY]);
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
