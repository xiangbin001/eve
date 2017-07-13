<?php
$alias = require BASE_DIR .'/config/alias.php';
spl_autoload_register(function ($class_name) use ($alias) {
    foreach ($alias as $key => $value) {
        if(strstr($class_name, $key)){
            $temp = BASE_DIR.'/'.$value;
            $class_name = str_replace($key, $temp, $class_name);
        }
    }
    require $class_name . '.php';
});