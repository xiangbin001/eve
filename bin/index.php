<?php
require __DIR__ .'/../vendor/autoload.php';
$config = require __DIR__ .'/../app/src/Bootstrap.php';

$app = new app\Application();
$app->setKernel(new src\AppKernel());
$app->setDi(new src\Di($argv, $config));
$app->run();