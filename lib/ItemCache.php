<?php

namespace lib;

abstract class ItemCache
{
    const CACHE_DIR = APP_DIR . 'data/';

    protected $cachedItems = null;

    protected $cachedItemsKeyMapped = null;


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

    public function clearCache()
    {
        $cfp = $this->getCachedFilePath();
        @unlink($cfp);
    }

    public function getItems()
    {
        if ($this->cachedItems !== null) {
            return $this->cachedItems;
        }

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

        $this->cachedItems = $itemsInfoArr;

        return $itemsInfoArr;
    }

    public function getItemsKeyMapped($keyName = 'id')
    {
        if ($this->cachedItemsKeyMapped !== null) {
            return $this->cachedItemsKeyMapped;
        }

        $items = $this->getItems();

        foreach ($items as $it) {
            if (!isset($it[$keyName])) {
                throw new \Exception('Не обнаружен требуемый ключ `' . $keyName . '`');
            }

            $this->cachedItemsKeyMapped[$it[$keyName]] = $it;
        }

        return $this->cachedItemsKeyMapped;
    }

    protected function ifDataValid($data)
    {
        if (!$data || (isset($data['result']) && $data['result'] == 'auth failed')) {
            return false;
        }

        return true;
    }

    public function getItemCount()
    {
        $items = $this->getItems();

        return is_array($items) ? count($items) : 0;
    }
}
