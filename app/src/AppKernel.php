<?php
namespace src;

use app\Application;
use src\Dispatcher;

class AppKernel implements KernelInterface
{
    public function runAll()
    {
        // self::checkVersion();
        self::checkSapi();
        self::installDispatcher();
        self::parseCommand();
    }

    private static function checkVersion()
    {
        if (version_compare(PHP_VERSION, '7.0.0', '<')) {
            exit("this script must running at php_version > 7.0.0.");
        }
    }

    private static function checkSapi()
    {
        if(php_sapi_name() != 'cli') {
            exit("this script must running in cli");
        }
    }

    private static function installDispatcher()
    {
        Application::$di->set('dispatcher', new Dispatcher);
    }

    private static function parseCommand()
    {
        $argv = Application::$di->argv;
        $dispatcher = Application::$di->get('dispatcher');
        $content = $dispatcher->dispatch($argv);
        return $content;
    }

}
