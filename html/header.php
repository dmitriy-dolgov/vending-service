<?php
define('LM_DEBUG', true);

define('APP_DIR', realpath(__DIR__ . '/..') . '/');

//require APP_DIR . 'vendor/autoload.php';

ini_set('log_errors', 1);
ini_set('error_log', APP_DIR . 'runtime/log/php-livemaster-error.log');
error_reporting(E_ALL);

if (LM_DEBUG) {
    ini_set('display_errors', 1);
} else {
    ini_set('display_errors', 0);
}

spl_autoload_extensions('.php');

//set_include_path(get_include_path() . PATH_SEPARATOR . realpath(__DIR__ . '/../'));
set_include_path(get_include_path() . PATH_SEPARATOR . realpath(__DIR__ . '/../'));

//echo get_include_path();exit;

// PSR-0
spl_autoload_register();

require APP_DIR . 'vendor/autoload.php';

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Сервис вендинга</title>
    <base href="/">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap-combobox.css"/>

</head>
<body>

<nav class="navbar navbar-light bg-primary navbar-expand-sm">
    <div class="container">
        <div class="d-flex align-items-center">
            <a class="navbar-brand logo navbar-link" href="/">Сервис вендинга</a>
        </div>
        <div class="d-flex align-items-center">
            <a class="sign-in-btn navbar-link ng-star-inserted">
                <span class="d-sm-inline">Выйти</span>
                <app-icon class="app-icon"></app-icon>
            </a>
            <button aria-haspopup="true" aria-label="Toggle navigation"
                    class="btn btn-sm navbar-toggler-btn" type="button">
                <app-icon class="app-icon"></app-icon>
            </button>
        </div>
    </div>
</nav>

<div class="container">
