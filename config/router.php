<?php
return $router = [
    "/" => [
        "namespace"  => "abundle",
        "controller" => 'index',
        "action"     => 'index'
    ],
    "/index" => [
        "namespace"  => "bbundle",
        "controller" => 'index',
        "action"     => 'index'
    ]
];