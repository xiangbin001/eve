<?php
namespace app;

//use src\{Di,Kernel};
use src\Di;
use src\KernelInterface;

class Application
{
    /**
     * @var Kernel
     */
    public static $kernel;

    public static $di;

    public function setKernel(KernelInterface $kernel)
    {
        self::$kernel = $kernel;
    }

    public function setDi(Di $di)
    {
        self::$di = $di;
    }

    public function run()
    {
        self::$kernel->runAll();
    }
}