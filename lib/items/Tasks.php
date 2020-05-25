<?php

namespace lib\items;

use lib\Api;
use lib\ItemCache;

class Tasks extends ItemCache
{
    protected $api;


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
        if ($this->cachedItems !== null) {
            return $this->cachedItems;
        }

        $items = $this->getItemsFromPrimaryRepository();

        $this->cachedItems = $items['tasks'] ?? [];

        $this->orderByDate($this->cachedItems, 'time_created');

        return $this->cachedItems;
    }

    public function getFilteredItems()
    {
        $itemsRaw = $this->getItems();

        $itemsFiltered = [];

        if (!empty($_GET['f-date_start']) || !empty($_GET['f-date_end'])) {
            $start = isset($_GET['f-date_start']) ? strtotime($_GET['f-date_start']) : 0;
            $end = isset($_GET['f-date_end']) ? strtotime($_GET['f-date_end']) : 32503680000;

            foreach ($itemsRaw as $itm) {
                //TODO: возможна оптимизация поскольку элементы должны быть уже отсортированы по дате в self::getItems()
                if ($timeCreated = strtotime($itm['time_created'])) {
                    if ($timeCreated >= $start && $timeCreated <= $end) {
                        $itemsFiltered[] = $itm;
                    }
                }
            }
        } else {
            $itemsFiltered = $itemsRaw;
        }

        if (!empty($_GET['f-author_user_id'])) {
            $itemsFilteredAuthor = [];
            foreach ($itemsFiltered as $itm) {
                if ($_GET['f-author_user_id'] == $itm['author_user_id']) {
                    $itemsFilteredAuthor[] = $itm;
                }
            }
            $itemsFiltered = $itemsFilteredAuthor;
        }

        if (!empty($_GET['f-worker_user_id'])) {
            $itemsFilteredWorker = [];
            foreach ($itemsFiltered as $itm) {
                if ($_GET['f-worker_user_id'] == $itm['worker_user_id']) {
                    $itemsFilteredWorker[] = $itm;
                }
            }
            $itemsFiltered = $itemsFilteredWorker;
        }

        if (!empty($_GET['f-status_id'])) {
            $itemsFilteredStatus = [];
            foreach ($itemsFiltered as $itm) {
                if (in_array($itm['state'], $_GET['f-status_id'])) {
                    $itemsFilteredStatus[] = $itm;
                }
            }
            $itemsFiltered = $itemsFilteredStatus;
        }

        $pageZeroBased = ($_GET['p_page'] ?? 1) - 1;
        $size = $_GET['p_size'] ?? 10;

        //TODO: оптимизиация
        $itemPages = array_chunk($itemsFiltered, $size);

        return $itemPages[$pageZeroBased] ?? end($itemPages);
    }

    public function newItem($divisionId, $workerUserId, $timeCreated, $comment = null)
    {
        // Похоже что так
        $machineId = $divisionId;

        //TODO: добавить часы/минуты/секунды
        $time = strtotime($timeCreated);

        $data = [
            'machine_id' => $machineId,
            'worker_user_id' => $workerUserId,
            'time_finished' => date('Y-m-d H:i:s'),
            //TODO: реализовать
            //'time_created' => date('', $time),     //2020-05-23T10:29:23.787Z
        ];

        if ($comment) {
            $data['comment'] = $comment;
        }

        $apiResult = $this->api->command('post', 'tasks', ['token' => $this->api::API_KEY], $data);

        if ($apiResult) {
            $this->clearCache();
        }

        return $apiResult;
    }
}
