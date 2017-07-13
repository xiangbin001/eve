<?php
namespace src;

use app\Application;

class Dispatcher
{
    private $router;

    public function __construct()
    {
        $this->router = require BASE_DIR .'/config/router.php';
    }

    public function dispatch($argv)
    {
        if(empty($argv[1])) {
            exit("Useage : php index.php \e[31m <ruter_name>\n");
        }
        $url = $argv[1];
        $a = explode('/', $url);


        $matched = $this->router[$url] ?? '';
        if($matched === '') {
            exit("your  \e[31m/<ruter_name> \e[44mis not defined\n");            
        }

        $controller_str = '\\'.$matched['namespace'].'\\'.ucfirst($matched['controller']).'controller';
        $controller = new $controller_str;
        Application::$di->set(md5($controller_str), $controller);
        $action = $matched['action'].'Action';

        $request_para = $argv[2] ?? [];
        call_user_func_array([$controller, $action], [$request_para]);
    }
}