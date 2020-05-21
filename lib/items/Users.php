<?php

namespace lib\items;

use lib\Api;
use lib\ItemCache;

class Users extends ItemCache
{
    protected $api;

    public function __construct()
    {
        $this->api = new Api();
    }

    protected function getItemsFromPrimaryRepository()
    {
        return $this->api->command('get', 'users', ['token' => $this->api::API_KEY]);
    }

    public function getItems()
    {
        $items = parent::getItems();

        return $items['users'] ?? [];
    }
}
