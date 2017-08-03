<?php
namespace src;

class Di
{
    public $pool = [];

    public $config = [];

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
        $this->config = $config;
    }

    public function set(string $name, $obj)
    {
        $this->pool[$name] = $obj;
    }

    public function get(string $name)
    {
        return $this->pool[$name] ?? NULL;
    }

    public function bootCapsule($db_name = 'capsule')
    {
        $capsule = $this->get($db_name);
        if(empty($capsule)) {
            $capsule = new Capsule();
            $capsule->addConnection($this->config['db_config']);
            $capsule->setAsGlobal();
            $capsule->bootEloquent();
            $this->set($db_name, $capsule);
        }
    }
}