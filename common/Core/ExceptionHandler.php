<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-07-04
 * Time: 9:39
 */

namespace Common\Core;

/**
 * 错误及异常处理器
 */
use Common\Exception\ErrorException;
use Common\Exception\LogicException;
use Common\Helpers\HttpHelper;
use Phalcon\Debug;
use Phalcon\Di\FactoryDefault;
use Phalcon\Http\Request;
use Phalcon\Version;

class ExceptionHandler
{
    private $debug;
    /**
     *
     * @var $request Request;
     */
    private $request;

    public function __construct($request = null)
    {
        if ($request !== null && is_object($request)) {
            $this->request = $request;
        } else {
            $this->request = (new FactoryDefault())->get('request');
        }
    }

    public function listen()
    {
        ini_set('display_errors', false);
        set_error_handler([$this, 'handleError']);
        set_exception_handler([$this, 'handleException']);
        register_shutdown_function([$this, 'handleFatalError']);
        return $this;
    }

    /*处理错误*/
    public function handleError($code, $message, $file = '', $line = 0)
    {
        if (error_reporting() & $code) {
            throw  new ErrorException($message, $code, $code, $file, $line);
        }
    }

    /*处理异常*/
    public function handleException(\Exception $exception)
    {
        $this->unregister();
        try {
            $this->logException($exception);
            $this->renderException($exception);
        } catch (\Exception $e) {//处理过程中有可能再次发生异常  尝试记录他
            $this->handleFallbackExceptionMessage($e, $exception);
        } catch (\Throwable $e) {
            $this->handleFallbackExceptionMessage($e, $exception);
        }
    }

    public function handleFatalError()
    {
        $error = error_get_last();
        if ($error && ErrorException::isFatalError($error)) {
            $exception = new ErrorException($error['message'], $error['type'], $error['type'], $error['file'], $error['line']);
            $this->handleException($exception);
        }
    }

    /**
     * 处理输出异常信息
     * @param \Exception $exception
     * @return string
     */
    public function renderException($exception)
    {

        /*用户自定义特殊类型的异常 一般为业务逻辑异常  怎么处理有异常本身决定*/
        if ($exception instanceof LogicException) {
            if (method_exists($exception, 'doException')) {
                return $exception->doException();
            }
        }
        /*通用异常处理 */
        if ($this->isDebug()) {/*开发模式*/
            if ($this->isReturnJson()) {
                $message = $this->getMessage($exception);
                echo json_encode(['status' => 'error', 'msg' => $message]);
                exit();
            } else {
                //echo $exception->getTraceAsString();
                return (new Debug())->onUncaughtException($exception);
            }
        } else {/*正式线上*/
            $message = '服务异常！请重试！';
            if ($this->isReturnJson()) {
                $message = $this->getMessage($exception);
                echo json_encode(['status' => 'error', 'msg' => $message]);
                exit();
            } else {
                exit($message);
            }
        }

    }

    /**
     * 记录异常
     * @param \Exception $e
     */
    public function logException( $exception)
    {
        $message = $this->getMessage($exception);
        if (FactoryDefault::getDefault()->has('log')) {
            $log = FactoryDefault::getDefault()->get('log');
            $log->error($message);
        } else {
            error_log($message . '[备注：没找到log服务启动系统日志]');
        }
    }

    /**
     * 处理 处理异常时 发生的异常
     * @param $exception
     * @param $previousException
     */
    protected function handleFallbackExceptionMessage($exception, $previousException)
    {
        $msg = "处理异常是发生错误，错误信息\n";
        $msg .= (string)$exception;
        $msg .= "\n要处理的异常为:\n";
        $msg .= (string)$previousException;
        error_log($msg . "\n\$_SERVER = " . var_export($_SERVER, true));
        if (PHP_SAPI === 'cli') {
            echo $msg . "\n";
        } else {
            if ($this->isDebug()) {
                $outMessage = '<pre>' . htmlspecialchars($msg, ENT_QUOTES) . '</pre>';
            } else {
                $outMessage = '处理异常发生错误！';
            }
            if ($this->isReturnJson()) {
                echo json_encode([
                    'status' => 'error',
                    'msg' => $outMessage
                ]);
            } else {
                echo $outMessage;
            }
        }
    }


    public function getVersion()
    {
        return "<div class='version'>Phalcon Framework " . Version::get() . "</div>";

    }

    /**
     * 是否调试模式下运行  在调试模式下 将暴露更多错误信息
     * @return bool
     */
    private function isDebug()
    {
        if ($this->debug === null) {
            return defined('APP_DEBUG') && APP_DEBUG === true;
        } else {
            return $this->debug;
        }

    }

    /**
     * @param $isDebug bool
     */
    public function setDebug($isDebug)
    {
        if ($isDebug === null) {
            $isDebug = false;
        }
        $this->debug = $isDebug;
    }

    public function getMessage( $exception)
    {
        $message = "message：" . $exception->getMessage() . "<hr>";
        $message .= "line：" . $exception->getLine() . "<hr>";
        $message .= 'Trace:<br/>' . str_replace("#", "<br/>#\r\n", $exception->getTraceAsString());
        return $message;
    }

    /*注销错误异常处理器*/
    public function unregister()
    {
        restore_error_handler();
        restore_exception_handler();
    }

    private function isReturnJson()
    {
        return HttpHelper::isReturnJson();
    }

}