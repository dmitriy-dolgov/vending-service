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

    protected function getUniqueName()
    {
        return 'equipment';
    }

    protected function getItemsFromPrimaryRepository()
    {
        return $this->api->command('get', 'machines', ['token' => Api::API_KEY]);
    }

    protected function ifDataValid($data)
    {
        if (!$data || (isset($data['result']) && $data['result'] == 'auth failed')) {
            return false;
        }

        return true;
    }

    public function getItems()
    {
        $itemsFiltered = [];

        $items = parent::getItems();

        foreach ($items as $it) {
            if (!in_array($it['model'], $itemsFiltered)) {
                $itemsFiltered[] = $it['model'];
            }
        }

        return $itemsFiltered;
    }
}
