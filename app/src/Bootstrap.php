<?php
define('BASE_DIR', realpath(__DIR__.'/../../'));
define('SRC_DIR', BASE_DIR.'/src');
require BASE_DIR .'/app/src/autoloader.php';

use Symfony\Component\Yaml\Yaml;
return Yaml::parse(file_get_contents(BASE_DIR .'/config/config.yml'));