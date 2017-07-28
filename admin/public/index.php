<?php
define('APP_BEGIN_TIME', microtime(true));
define('APP_BEGIN_MEMORY', memory_get_usage());
/*这三个必须定义*/
define('PROJECT_PATH', dirname(__DIR__));//当前项目目录
define('ROOT_PATH', dirname(PROJECT_PATH));//总的根目录
define('COMMON_PATH', ROOT_PATH . '/common');//通用目录

/*注册自动加载器*/
$loader = require COMMON_PATH . "/config/loader.php";
$loader->registerNamespaces([
    'Admin'=>PROJECT_PATH
],true);
/*启动系统*/
$bootstrap = new \Admin\Bootstrap($loader);
$bootstrap->run();
///*调试性能用*/
timeAndMem();
function timeAndMem()
{
    $nowTime = microtime(true) - APP_BEGIN_TIME;
    $nowMem = memory_get_usage() - APP_BEGIN_MEMORY;
    $log = __DIR__ . '/../cache/timeAndMem.log';
    $content = file_exists($log) ? file_get_contents($log) : '';
    if ($content) {
        $time = explode('|', $content)[0];
        $mem = explode('|', $content)[1];
    } else {
        $time = $nowTime;
        $mem = $nowMem;
    }
    $newTime = ($nowTime + $time) / 2;
    $newMem = ($nowMem + $mem) / 2;
    file_put_contents($log, $newTime . '|' . $newMem);
    $request = (new \Phalcon\Di\FactoryDefault())->get('request');
    if (!$request->isAjax() && !strpos($request->getURI(), '_debugbar')) {
        echo "\r\n <br/> \r\n";
        echo '平均时间:' . $newTime . '当前时间:' . $nowTime;
        echo "\r\n <br/> \r\n";
        echo '平均内存:' . $newMem . '当前内存:' . $nowMem;
    }
}
