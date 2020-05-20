<?php

namespace lib;

abstract class ItemCache
{
    const CACHE_DIR = APP_DIR . 'data/';


    abstract protected function getUniqueName();

    abstract protected function getItemsFromPrimaryRepository();

    abstract protected function ifDataValid($data);


    protected function getCachedFilePath()
    {
        return self::CACHE_DIR . $this->getUniqueName() . '.json';
    }

    public function getItems()
    {
        $itemsInfoArr = null;

        $cfp = $this->getCachedFilePath();

        if (is_file($cfp)) {
            if ($itemsInfoJson = file_get_contents($cfp)) {
                $itemsInfoArr = json_decode($itemsInfoJson, true);
                if (!$this->ifDataValid($itemsInfoArr)) {
                    unlink($cfp);
                    return null;
                }
            }
        }

        if ($itemsInfoArr === null) {
            $itemsInfoArr = $this->getItemsFromPrimaryRepository();
            if (!$this->ifDataValid($itemsInfoArr)) {
                return null;
            }
            file_put_contents($cfp, json_encode($itemsInfoArr));
        }

        return $itemsInfoArr;
    }
}
