<?php
return  new \Phalcon\Config([
    'debug' => false,
    'database' => [
        'adapter' => 'Mysql',
        'host' => '192.168.0.22',
        'username' => 'root',
        'password' => 'root123',
        'dbname' => 'magiclamp',
        'charset' => 'utf8',
    ]
]);