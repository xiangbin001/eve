<?php
use Symfony\Component\Yaml\Yaml;
$alias = Yaml::parse(file_get_contents(BASE_DIR .'/config/alias.yml'));
spl_autoload_register(function ($class_name) use ($alias) {
    foreach ($alias as $key => $value) {
        if(strstr($class_name, $key)){
            $temp = BASE_DIR.'/'.$value;
            $class_name = str_replace($key, $temp, $class_name);
        }
    }
    $class_name = str_replace('\\', '/', $class_name);
    require $class_name . '.php';
});