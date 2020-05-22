<?php

namespace lib\items;

use lib\Api;
use lib\ItemCache;

class Tasks extends ItemCache
{
    protected $api;

    protected $items;


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
        if (!$this->items) {
            $this->items = parent::getItems();
        }

        return $this->items;
    }

    public function getItemCount()
    {
        if (!$this->items) {
            $this->items = $this->getItems();
        }

        return count($this->items);
    }
}
