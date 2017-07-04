<?php

$time1 = microtime(true);
$m1 = memory_get_usage();
/*这三个必须定义*/
define('ROOT_PATH', dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR);//总的根目录
define('PROJECT_PATH', ROOT_PATH . 'admin' . DIRECTORY_SEPARATOR);//当前项目目录
define('COMMON_PATH', ROOT_PATH . 'common' . DIRECTORY_SEPARATOR);//通用目录

///*注册自动加载器*/
$loader = require PROJECT_PATH . 'config/loader.php';
try {
    $bootstrap = new \Admin\Bootstrap($loader);
    $bootstrap->run();
} catch (\Exception $e) {//最外层异常
    $request = (new\Phalcon\Di\FactoryDefault())->get('request');
    $message = "message：" . $e->getMessage() . "<hr>";
    $message = "line：" . $e->getLine() . "<hr>";
    $message .= 'Trace:<br/>' . str_replace("#", "<br/>#\r\n", $e->getTraceAsString());
    file_put_contents(
        PROJECT_PATH . 'logs/IndexException.logs',
        "\r\n\r\n-----[" . date("Y-m-d H:i:s") . "]-------\r\n" . $message . "\r\n--SERVICE INFO--\r\n" . json_encode($_SERVER) . "\r\n" . json_encode($_POST),
        FILE_APPEND);
    //记录日志
    if (!defined('APP_DEBUG') || empty(APP_DEBUG)) {
        $message = '服务异常！请重试！';
    }
    if ($request->isAjax() && $request->get('dataType') !== 'html') {
        echo json_encode(['status' => 'error', [], 'msg' => $message]);
    } else {
        if (!defined('APP_DEBUG') || empty(APP_DEBUG)) {
            echo $message;
        } else {
            throw $e;
        }
    }
}

/*调试性能用*/
/*timeAndMem(microtime(true) - $time1, memory_get_usage() - $m1);
function timeAndMem($nowTime = 0, $nowMem = 0)
{
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
    $request = \Phalcon\Di\FactoryDefault::getDefault()->get('request');
    if (!$request->isAjax() && !strpos($request->getURI(), '_debugbar')) {
        echo "\r\n <br/> \r\n";
        echo '平均时间:' . $newTime . '当前时间:' . $nowTime;
        echo "\r\n <br/> \r\n";
        echo '平均内存:' . $newMem . '当前内存:' . $nowMem;
    }
}*/
