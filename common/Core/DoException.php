<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-07-11
 * Time: 10:19
 */

namespace Common\Core;
/*处理异常*/
class DoException
{
    public static function doException(\Exception $e)
    {
        $request = (new\Phalcon\Di\FactoryDefault())->get('request');
        /*获取message*/
        $message = "message：" . $e->getMessage() . "<hr>";
        $message .= "line：" . $e->getLine() . "<hr>";
        $message .= 'Trace:<br/>' . str_replace("#", "<br/>#\r\n", $e->getTraceAsString());
        /*记录异常*/
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

}