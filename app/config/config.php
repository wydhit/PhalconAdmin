<?php


defined('D_S') ||define('D_S',DIRECTORY_SEPARATOR);
defined('BASE_PATH') ||define('BASE_PATH', realpath(dirname(dirname(__DIR__))).D_S);//项目根目录
defined('APP_PATH') ||define('APP_PATH', BASE_PATH.'app'.D_S);//主体应用目录
date_default_timezone_set('Asia/Shanghai');

$config = new \Phalcon\Config([
    'debug' => false,
    'database' => [
        'adapter' => 'Mysql',
        'host' => '192.168.0.22',
        'username' => 'root',
        'password' => 'root123',
        'dbname' => 'magiclamp',
        'charset' => 'utf8',
    ],
    'application' => [
        'appDir'         => APP_PATH,
        'modelsDir'      => APP_PATH . 'common/models'.D_S,
        'migrationsDir'  => APP_PATH . 'migrations'.D_S,
        'cacheDir'       => BASE_PATH . 'cache'.D_S,
        'baseUri' => '/'
    ]

]);

if (file_exists(__DIR__ . '/local.config.php')) {
    $local_configs = require(__DIR__ . '/local.config.php');
    $config = $config->merge($local_configs);
}
return $config;