<?php

namespace lib\items;

use lib\Api;
use lib\ItemCache;

class Cities extends ItemCache
{
    protected $api;

    public function __construct()
    {
        $this->api = new Api();
    }

    protected function getItemsFromPrimaryRepository()
    {
        return $this->api->command('get', 'cities', [
            'token' => $this->api::API_KEY,
            //TODO: уточнить у апишников зачем так делать чтобы вернуть записей больше чем 20(?)
            'size' => 999999,
        ]);
    }

    public function getItems()
    {
        $items = parent::getItems();

        return $items;
    }
}
