<?php

namespace lib\items;

use lib\ItemCache;

class Status extends ItemCache
{
    public function getItemsFromPrimaryRepository()
    {
        return $this->getItems();
    }

    public function getItems()
    {
        return [
            ['id' => '0', 'name' => 'Создано'],
            ['id' => '1', 'name' => 'Выполняется'],
            ['id' => '2', 'name' => 'Завершено'],
            ['id' => '3', 'name' => 'Удалено'],
        ];
    }
}
