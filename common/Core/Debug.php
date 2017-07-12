<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-07-04
 * Time: 9:39
 */

namespace Common\Core;


use Common\Core\Exception\UserException;
use Phalcon\Exception;
use Phalcon\Version;

class Debug extends \Phalcon\Debug
{
    public function onUncaughtException(\Exception $exception)
    {
        $this->logger($exception);
        $this->render($exception);
    }

    /**
     * 处理输出异常信息
     * @param \Exception $exception
     * @return string
     */
    public function render(\Exception $exception)
    {
        $request = (new\Phalcon\Di\FactoryDefault())->get('request');

        /*特殊类型的异常*/
        if($exception instanceof UserException){//业务逻辑异常
            echo json_encode($exception->outData());
            die();
        }


        if (defined('APP_DEBUG') && APP_DEBUG) {/*开发模式*/
            if ($request->isAjax() && $request->isPost()) {
                $message = $this->getMessage($exception);
                echo json_encode(['status' => 'error', 'msg' => $message]);
                exit();
            } else {
                return parent::onUncaughtException($exception);
            }
        } else {/*正式线上*/
            $message = '服务异常！请重试！';
            if ($request->isAjax() && $request->isPost()) {
                $message = $this->getMessage($exception);
                echo json_encode(['status' => 'error', 'msg' => $message]);
                exit();
            } else {
                exit($message);
            }
        }

    }

    public function getMessage(\Exception $exception)
    {
        $message = "message：" . $exception->getMessage() . "<hr>";
        $message .= "line：" . $exception->getLine() . "<hr>";
        $message .= 'Trace:<br/>' . str_replace("#", "<br/>#\r\n", $exception->getTraceAsString());
        return $message;
    }

    /**
     * 记录异常
     * @param \Exception $e
     */
    public function logger(\Exception $exception)
    {
        $message = $this->getMessage($exception);
        file_put_contents(
            PROJECT_PATH . 'logs/Exception-' . date('Y-m-d') . '.logs',
            "\r\n\r\n-----[" . date("Y-m-d H:i:s") . "]-------\r\n" . $message . "\r\n--SERVICE INFO--\r\n" . json_encode($_SERVER) . "\r\n" . json_encode($_POST),
            FILE_APPEND);

    }

    public function getVersion()
    {
        return "<div class='version'>Phalcon Framework " . Version::get() . "</div>";

    }

}