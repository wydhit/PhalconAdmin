<?php

namespace Common\Exception;

use Common\Helpers\HttpHelper;
use Phalcon\Exception;

class LogicException extends Exception
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

    public function doException()
    {
        if (HttpHelper::isReturnJson()) {
            echo json_encode($this->outData());
        } else {
            echo $this->msg;
        }
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