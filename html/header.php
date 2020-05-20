<?php
define('LM_DEBUG', true);

define('APP_DIR', realpath(__DIR__ . '/..') . '/');

require APP_DIR . 'vendor/autoload.php';

ini_set('log_errors', 1);
ini_set('error_log', APP_DIR . 'runtime/log/php-livemaster-error.log');
error_reporting(E_ALL);

if (LM_DEBUG) {
    ini_set('display_errors', 1);
} else {
    ini_set('display_errors', 0);
}

spl_autoload_extensions('.inc,.php');

set_include_path(get_include_path() . PATH_SEPARATOR . realpath(__DIR__ . '/../'));

// PSR-0
spl_autoload_register();
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title></title>
    <base href="/">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/main.css"/>

</head>
<body>

    <nav class="navbar navbar-light bg-primary navbar-expand-sm">
        <div class="container">
            <div class="d-flex align-items-center"><a
                        class="navbar-brand logo navbar-link"
                        routerlink="/" ng-reflect-router-link="/"
                        href="/">Сервис вендинга</a></div>
            <div class="d-flex align-items-center"><a class="sign-in-btn navbar-link ng-star-inserted"><span
                            class="d-none d-sm-inline">Выйти</span>
                    <app-icon class="app-icon" name="sign-out" size="24" _nghost-mlo-c1=""
                              ng-reflect-size="24" ng-reflect-name="sign-out"
                              style="background-image: url(&quot;sign-out.png&quot;); min-height: 24px; min-width: 24px; height: 24px; width: 24px;"></app-icon>
                </a>
                <button aria-haspopup="true" aria-label="Toggle navigation"
                        class="btn btn btn-sm navbar-toggler-btn" type="button" ng-reflect-menu="[object Object]">
                    <app-icon class="app-icon" name="ic_header_menu" _nghost-mlo-c1=""
                              ng-reflect-size="24" ng-reflect-name="ic_header_menu"
                              style="background-image: url(&quot;ic_header_menu.png&quot;); min-height: 24px; min-width: 24px; height: 24px; width: 24px;"></app-icon>
                </button>
                <mat-menu class="" xposition="before" ng-reflect-x-position="before"
                          ng-reflect-panel-class="base-nav-menu"></mat-menu>
            </div>
        </div>
    </nav>

    <div  class="container">
