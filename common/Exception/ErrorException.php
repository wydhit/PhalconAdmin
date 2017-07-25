<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-07-24
 * Time: 15:14
 */

namespace Common\Exception;


class ErrorException extends \ErrorException
{
    public function __construct($message = '', $code = 0, $severity = 1, $filename = __FILE__, $lineno = __LINE__, \Exception $previous = null)
    {
        parent::__construct($message, $code, $severity, $filename, $lineno, $previous);
    }



    /**
     * Returns if error is one of fatal type.
     *
     * @param array $error error got from error_get_last()
     * @return bool if error is one of fatal type
     */
    public static function isFatalError($error)
    {
        return isset($error['type']) &&
            in_array($error['type'], [
                    E_ERROR,
                    E_PARSE,
                    E_CORE_ERROR,
                    E_CORE_WARNING,
                    E_COMPILE_ERROR,
                    E_COMPILE_WARNING
                ]
            );
    }

    /**
     * @return string the user-friendly name of this exception
     */
    public function getName($code = null)
    {
        static $names = [
            E_COMPILE_ERROR => 'PHP Compile Error',
            E_COMPILE_WARNING => 'PHP Compile Warning',
            E_CORE_ERROR => 'PHP Core Error',
            E_CORE_WARNING => 'PHP Core Warning',
            E_DEPRECATED => 'PHP Deprecated Warning',
            E_ERROR => 'PHP Fatal Error',
            E_NOTICE => 'PHP Notice',
            E_PARSE => 'PHP Parse Error',
            E_RECOVERABLE_ERROR => 'PHP Recoverable Error',
            E_STRICT => 'PHP Strict Warning',
            E_USER_DEPRECATED => 'PHP User Deprecated Warning',
            E_USER_ERROR => 'PHP User Error',
            E_USER_NOTICE => 'PHP User Notice',
            E_USER_WARNING => 'PHP User Warning',
            E_WARNING => 'PHP Warning'
        ];
        if ($code === null) {
            $code = $this->getCode();
        } else {
            $code = (int)$code;
        }
        return isset($names[$code]) ? $names[$code] : 'Unknown Error';
    }
}