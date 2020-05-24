<?php

header('Location: //' . $_SERVER['SERVER_NAME'] . '/tasks');
exit;

require 'vendor/autoload.php';

use GuzzleHttp\Client;

error_reporting(E_ALL);
ini_set('display_errors', 1);


/*$client = new Client([
    // Base URI is used with relative requests
    'base_uri' => 'http://httpbin.org',
    // You can set any number of default request options.
    'timeout' => 2.0,
]);*/

$client = new Client();

$res = $client->request('GET', 'http://httpbin.org', [
    'query' => ['foo' => 'bar'],
]);

print_r($res);

