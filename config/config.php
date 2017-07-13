<?php
define('BASE_DIR', realpath(__DIR__.'/..'));
define('SRC_DIR', BASE_DIR.'/src');
require __DIR__ .'/../config/autoloader.php';

return
$config = [
    'db_config'    => [],
    'redis_config' => [],
    'master_pid'   => '',
    'worker_num'   => '',
    'daemon'       => false,
    'log_path'     => '',
];