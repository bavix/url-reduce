<?php

require_once '../vendor/autoload.php';

$pixie = new \App\Pixie();
$pixie->bootstrap(dirname(__DIR__))
    ->handle_http_request();
