<?php

use Illuminate\Database\Capsule\Manager;

$capsule = new Manager;

$capsule->addConnection([
    'driver'    => $_ENV['DB_DRIVER'],
    'host'      => $_ENV['DB_HOST'],
    'database'  => $_ENV['DB_NAME'],
    'username'  => $_ENV['DB_USER'],
    'port'      => $_ENV['DB_PORT'],
    'password'  => $_ENV['DB_PASS'],
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
    'strict'    => false
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();
