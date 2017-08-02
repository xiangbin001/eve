<?php
namespace src;

class Controller
{
    public $config;

    public function __construct()
    {
        $this->config = Di::$config;
    }

}