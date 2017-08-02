<?php
namespace src;

class Di
{
    public $pool = [];

    public static $config = [];

    public $argv = '';

    public function __construct($argv, $config)
    {
        $this->setCommand($argv);
        $this->setConfig($config);

    }

    public function setCommand($argv)
    {
        $this->argv = $argv;
    }

    public function setConfig($config)
    {
        self::$config = $config;
    }

    public function set(string $name, $obj)
    {
        $this->pool[$name] = $obj;
    }

    public function get(string $name)
    {
        return $this->pool[$name];
    }

}