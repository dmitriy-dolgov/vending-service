<?php

namespace lib\items;

class Status
{
    public function getItems()
    {
        return [
            ['id' => '1', 'name' => 'Создано'],
            ['id' => '2', 'name' => 'Выполняется'],
            ['id' => '3', 'name' => 'Завершено'],
            ['id' => '4', 'name' => 'Удалено'],
        ];
    }
}
