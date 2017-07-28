<?php
/*这三个必须定义*/
define('ROOT_PATH', dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR);//总的根目录
define('PROJECT_PATH', ROOT_PATH . 'api' . DIRECTORY_SEPARATOR);//当前项目目录
define('COMMON_PATH', ROOT_PATH . 'common' . DIRECTORY_SEPARATOR);//通用目录

///*注册自动加载器*/
$loader = require COMMON_PATH . '/config/loader.php';
$loader->registerNamespace([
    'Api'=>PROJECT_PATH
],true);
/*注册错误处理*/
/*启动系统*/
$bootstrap = new \Api\Bootstrap($loader);
$bootstrap->run();