<?php
namespace middleware;

class Pre
{
    public function __construct()
    {
        var_dump('construce');
    }

    public function sss()
    {
        var_dump('pre::sss');
    }
}