<?php
if(!defined('ROOT_PATH')){
    define('ROOT_PATH',dirname(dirname(__DIR__)));
}
if (file_exists(ROOT_PATH . '/vendor/autoload.php')) {
   include(ROOT_PATH . '/vendor/autoload.php');
}
$loader = new \Phalcon\Loader();
$loader->registerNamespaces([
    'Common' => COMMON_PATH
]);
return $loader->register();