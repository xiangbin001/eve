<?php
namespace src;

use app\Application;

class Kernel implements KernelInterface
{
    public function runAll()
    {
        // self::checkVersion();
        self::checkSapi();
        self::parseCommand();
        self::installSignal();
        self::loop();
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

    private static function parseCommand()
    {
        $argv = Application::$di->argv;
        if(empty($argv[1])) {
            exit("Useage : php index.php \e[31m{start|stop|reload}\n");
        }


        switch ($argv[1]) {
            case 'start':
                if(is_file(BASE_DIR.'/runtime/master.pid')){
                    exit("master is in running");
                }
                file_put_contents(BASE_DIR.'/runtime/master.pid', posix_getpid());
                break;
            case 'stop':
                posix_kill(file_get_contents(BASE_DIR.'/runtime/master.pid'), SIGKILL);
                unlink(BASE_DIR.'/runtime/master.pid');
                exit();
                break;
            case 'reload':
                posix_kill(file_get_contents(BASE_DIR.'/runtime/master.pid'), SIGTERM);
                //unlink(BASE_DIR.'/runtime/master.pid');
                exit();
                break;
            default:
                exit("Check your input para \e[30m{start|stop|reload}");
        }

    }

    private static function installSignal()
    {
        // $w = new \EvSignal(SIGUSR1, function () {
        //     file_put_contents(BASE_DIR.'/runtime/ss.log',123);
        // });

        // $s = new \EvSignal(SIGTERM, function () {
        //     file_put_contents(BASE_DIR.'/runtime/SIGTERM.log',123);
        // });
        // \Ev::run();
    }

    private static function loop()
    {
    }
}
