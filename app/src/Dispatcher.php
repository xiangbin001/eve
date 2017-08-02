<?php
namespace src;

use app\Application;
use Symfony\Component\Yaml\Yaml;

class Dispatcher
{
    private $router;

    public function __construct()
    {
        $this->router = Yaml::parse(file_get_contents(BASE_DIR .'/config/router.yml'));
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
            exit("your \e[31m<ruter_name> \e[44m is not defined\n");            
        }

        if(!empty($matched['middleware'])){
            $mid_action = explode('@', $matched['middleware']);
            $middware_class_str = '\\middleware\\'. $mid_action[0];
            $middware = new $middware_class_str();
            $middware_action_str = $mid_action[1];
            $middware->$middware_action_str();
        }

        $controller_str = '\\'.$matched['namespace'].'\\'.ucfirst($matched['controller']).'controller';
        $controller = new $controller_str;
        Application::$di->set(md5($controller_str), $controller);
        $action = $matched['action'].'Action';

        $request_para = $argv[2] ?? [];
        call_user_func_array([$controller, $action], [$request_para]);
    }
}