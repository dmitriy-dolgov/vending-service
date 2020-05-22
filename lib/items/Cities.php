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
        return [
            ['id' => '6627', 'name' => 'Абакам'],
            ['id' => '6628', 'name' => 'Азнакаево'],
            ['id' => '6629', 'name' => 'Альметьевск'],
            ['id' => '6630', 'name' => 'Астрахань'],
            ['id' => '6631', 'name' => 'Благовещенск'],
        ];
    }

    public function getItems()
    {
        $items = parent::getItems();

        return $items;
    }
}
