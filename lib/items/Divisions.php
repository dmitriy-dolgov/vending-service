<?php

namespace lib\items;

use lib\Api;
use lib\ItemCache;

class Divisions extends ItemCache
{
    protected $api;

    public function __construct()
    {
        $this->api = new Api();
    }

    protected function getItemsFromPrimaryRepository()
    {
        return $this->api->command('get', 'divisions', ['token' => $this->api::API_KEY]);
    }

    public function getItems()
    {
        $items = parent::getItems();

        return $items;
    }

    /*public function getMachine($divisionId)
    {
        $machines = (new Machine())->getItemsKeyMapped();

        return $machines[$divisionId] ?? false;
    }*/
}
