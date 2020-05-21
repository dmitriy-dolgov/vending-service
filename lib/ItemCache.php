<?php

namespace lib;

abstract class ItemCache
{
    const CACHE_DIR = APP_DIR . 'data/';


    abstract protected function getItemsFromPrimaryRepository();


    protected function getUniqueName()
    {
        $nameParts = explode('\\', static::class);
        return strtolower(array_pop($nameParts));
    }

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

    protected function ifDataValid($data)
    {
        if (!$data || (isset($data['result']) && $data['result'] == 'auth failed')) {
            return false;
        }

        return true;
    }
}
