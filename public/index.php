<?php
use Phalcon\Mvc\Application;
//use Common\Core\Application;

$time = microtime(true);
$m = memory_get_usage();
$config = require __DIR__ . '/../app/config/config.php';//加载配置
define('APP_DEBUG', isset($config->debug) ? $config->debug : false);
APP_DEBUG && require BASE_PATH . 'vendor/autoload.php';
try {
    /*加载服务*/
    require APP_PATH . 'config/services.php';
    $loader = $di->get('loader')->register();
    /*初始化应用主题*/
    $application = new Application($di);
    APP_DEBUG && $di['app'] = $application;;
    /*禁用默认视图解析注册模块*/
    $allModule = require APP_PATH . 'config/modules.php';
    $application->useImplicitView(false)->registerModules($allModule);
    /*加载路由*/
    require APP_PATH . 'config/routes.php';
    APP_DEBUG && (new Snowair\Debugbar\ServiceProvider(APP_PATH . 'config/debugger_config.php'))->start();
    /*处理请求*/
    $response = $application->handle();
    /*发送结果*/
    $response->send();
} catch (\Exception $e) {//最外层异常
    $request = (new\Phalcon\Di\FactoryDefault())->get('request');
    //记录日志
    if (APP_DEBUG) {
        $message = "message：" . $e->getMessage() . "<hr>";
        $message .= 'Trace:<br/>' . str_replace("#", "<br/>#\r\n", $e->getTraceAsString());
    } else {
        $message = '服务异常！请重试！';
    }
    if ($request->isAjax() && $request->get('dataType') !== 'html') {
        echo json_encode(['status' => 'error', [], 'msg' => $message]);
    } else {
        echo $message;
    }
}