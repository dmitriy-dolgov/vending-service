<?php

$action = $_POST['action'] ?? 'unknown';
if ($action !== 'create-task') {
    die('Неверная команда');
}

//curl -X POST "http://178.57.218.210:4001/tasks?token=TS3qVh70xrM59VC9OxqK3UZV"
// -H  "accept: application/json"
// -H  "Content-Type: application/json-patch+json"
// -d "{\"machine_id\":0,\"worker_user_id\":0,\"time_finished\":\"2020-05-23T10:29:23.787Z\"}"

/*
{
  "tasks": [
    {
      "guid": "-M0ajMUfXlq6EtON3Xpp",
      "machine_id": null,
      "author_user_id": 88,
      "worker_user_id": 2,
      "last_change_user_id": 88,
      "state": 0,
      "comment": null,
      "changed_on_client": 0,
      "operations_text": null,
      "time_created": "2020-02-27 12:31:35",
      "time_finished": null,
      "time_changed": "2020-05-20 19:08:21"
    }
  ]
}

{
  "service_operations": [
    {
      "guid": "-Lv2G0uWjy4v43kbyOek",
      "task_guid": "-M0ajMUfXlq6EtON3Xpp",
      "order_id": 1,
      "operation_type_id": 16,
      "description": "Ремонт",
      "state": 1,
      "time_changed": "2020-03-15 02:06:02"
    }
  ],
  "photos": []
}
 */

print_r($_POST);exit;

$tasks = new \lib\items\Tasks();

$tasks->newItem();