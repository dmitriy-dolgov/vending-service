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
        return $this->api->command('get', 'divisions', [
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

    /*public function getCityNameByDivisionAddress($divisionName)
    {
        $divisionName = trim($divisionName, ", \t\n\r\0\x0B");

//        foreach ($this->getItems() as $item) {
//            if ($divisionName == trim($item['description'], ", \t\n\r\0\x0B")) {
//                return ' ++ ' . $item['city_id'];
//            }
//        }

        foreach ($this->getItems() as $item) {
            if ($divisionName == trim($item['address'], ", \t\n\r\0\x0B")) {
                return $item['city_id'];
            }
        }

        return '';
    }*/
}
