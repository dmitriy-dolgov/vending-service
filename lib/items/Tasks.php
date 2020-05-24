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
        $items = parent::getItems();

        return $items['tasks'] ?? [];
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
