<?php
namespace service;

use Symfony\Component\BrowserKit\Client as BaseClient;
use Symfony\Component\BrowserKit\Response;

class Client extends BaseClient
{
    protected function doRequest($request)
    {
    //     return new Response($content, $status, $headers);
    }
}