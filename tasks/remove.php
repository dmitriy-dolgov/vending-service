<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

ob_start();

require_once __DIR__ . '/../html/header.php';

$action = $_POST['action'] ?? 'unknown';
if ($action === 'remove-task') {

    $tasks = new \lib\items\Tasks();

    $result = false;

    try {
        $result = $tasks->deleteItem($_POST['removed-task-guid']);
    } catch (\Exception $e) {
        //TODO: логирование
        echo 'Произошло исключение: ' . $e->getCode() . "<br>\n";
    }

    if ($result) {
        header('Location: //' . $_SERVER['SERVER_NAME'] . '/tasks');
        exit;
    } else {
        echo 'Ошибка удаления!';
    }

} else {
    echo 'Неверная команда';
}

ob_end_flush();
require_once __DIR__ . '/../html/footer.php';
