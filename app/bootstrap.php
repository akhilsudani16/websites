<?php

use app\Core\App;
use app\Core\Container;
use app\Core\Database;

$container = new Container();

$container->bind('app\Core\Database', function () {
    $config = require base_path('config.php');
    return new Database($config['database']);
});

App::setContainer($container);