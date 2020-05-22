<?php

namespace lib\items;

use lib\Api;
use lib\ItemCache;

class Equipment extends ItemCache
{
    protected $api;

    public function __construct()
    {
        $this->api = new Api();
    }

    protected function getItemsFromPrimaryRepository()
    {
        return $this->api->command('get', 'machines', ['token' => $this->api::API_KEY]);
    }

    public function getItems()
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
}
