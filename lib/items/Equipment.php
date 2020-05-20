<?php

namespace lib\items;

use lib\Api;
use lib\ItemCache;

class Equipment extends ItemCache
{
    protected $api;


    protected function getUniqueName()
    {
        return 'equipment';
    }

    public function __construct()
    {
        $this->api = new Api();
    }

    protected function getItemsFromPrimaryRepository()
    {
        return Api::command('get', 'machines');
    }

    public function getList()
    {
        $items = parent::getItems();
        return $items;
    }
}
