<?php
////use Common\Core\Application;
//use Phalcon\Mvc\Application;
//
//define('D_S', DIRECTORY_SEPARATOR);
//define('BASE_PATH', realpath(dirname(__DIR__)) . D_S);//项目根目录
//define('APP_PATH', BASE_PATH . 'app' . D_S);//主体应用目录
//date_default_timezone_set('Asia/Shanghai');
///*加载公共配置*/
//$config = require APP_PATH . 'config/config.php';
//define('APP_DEBUG', isset($config->debug) ? $config->debug : false);
//APP_DEBUG && require BASE_PATH . 'vendor/autoload.php';
//
//try {
//    /*处理自动加载*/
//    $loader = require APP_PATH . 'config/autoLoader.php';
//    /*加载公共服务*/
//    $di = require APP_PATH . 'config/services.php';
//    /*初始化应用主题*/
//    $application = new Application($di);
//    $application->useImplicitView(false);
//    APP_DEBUG && $di['app'] = $application;
//    /*禁用默认视图解析注册模块*/
//    $allModule = require APP_PATH . 'config/modules.php';
//    $application->useImplicitView(false);
//    $application->registerModules($allModule);
//    /*加载路由*/
//    require APP_PATH . 'config/routes.php';
//    APP_DEBUG && (new Snowair\Debugbar\ServiceProvider(APP_PATH . 'config/debugger_config.php'))->start();
//    /*处理请求*/
//    $response = $application->handle();
//    /*发送结果*/
//    $response->send();
//} catch (\Exception $e) {//最外层异常
//    $request = (new\Phalcon\Di\FactoryDefault())->get('request');
//    $message = "message：" . $e->getMessage() . "<hr>";
//    $message .= 'Trace:<br/>' . str_replace("#", "<br/>#\r\n", $e->getTraceAsString());
//    file_put_contents(
//        BASE_PATH . 'logs/IndexException.logs',
//        "\r\n\r\n-----[" . date("Y-m-d H:i:s") . "]-------\r\n" . $message . "\r\n--SERVICE INFO--\r\n" . json_encode($_SERVER) . "\r\n" . json_encode($_POST),
//        FILE_APPEND);
//    //记录日志
//    if (empty(APP_DEBUG)) {
//        $message = '服务异常！请重试！';
//    }
//    if ($request->isAjax() && $request->get('dataType') !== 'html') {
//        echo json_encode(['status' => 'error', [], 'msg' => $message]);
//    } else {
//        echo $message;
//    }
//}