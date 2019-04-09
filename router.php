<?php
require_once __DIR__ . '/vendor/autoload.php';

$klein = new \Klein\Klein();

$klein->respond('GET', '/login', function(){
    require 'login.php';
});
$klein->respond('GET','/',function () {
    require 'landing.php';
});

$klein->dispatch();