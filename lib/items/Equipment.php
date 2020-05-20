<?php

namespace lib\items;

use lib\ItemCache;

class Equipment extends ItemCache
{
    protected function getUniqueName()
    {
        return 'equipment';
    }

    protected function getItemsFromPrimaryRepository()
    {
        Api::command();
    }

    public function getList()
    {
        //public function
    }
}
