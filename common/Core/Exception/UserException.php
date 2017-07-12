<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-07-12
 * Time: 8:31
 */

namespace Common\Core\Exception;


use Phalcon\Exception;
use Throwable;

class UserException extends Exception
{
    public $status = 'error';
    public $msg;
    public $data;
    public $errInput;
    public $goUrl;

    public function __construct($msg = '', $data = [], $errInput = [], $goUrl = '')
    {
        $this->status = 'error';
        $this->msg = $msg;
        $this->data = $data;
        $this->errInput = $errInput;
        $this->goUrl = $goUrl;
        parent::__construct($msg, 499, null);
    }

    public function outData()
    {
        return [
            'status' => $this->status,
            'msg' => $this->msg,
            'data' => $this->data,
            'errInput' => $this->errInput,
            'goUrl' => $this->goUrl
        ];
    }

}