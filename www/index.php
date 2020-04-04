<?php

require "../vendor/autoload.php";

use App\Config;

use Base\Application;

Config\Config::init();

$app = new Application();

$app->run();


