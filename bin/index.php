<?php
require __DIR__ .'/../vendor/autoload.php';
require __DIR__ .'/../app/src/Bootstrap.php';

use Symfony\Component\Yaml\Yaml;
$config = Yaml::parse(file_get_contents(BASE_DIR .'/config/config.yml'));
$app = new app\Application();
$app->setKernel(new src\AppKernel());
$app->setDi(new src\Di($argv, $config));
$app->run();