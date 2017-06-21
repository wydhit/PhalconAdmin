<?php

namespace Common\Models;

use \Phalcon\Mvc\Model;

class BaseModel extends Model
{
    /*需要返回的业务信息 一般为错误信息*/
    public $msg = [];
    public function addMsg($msg = '')
    {
        $this->msg[] = $msg;
    }
    public function getMsg()
    {
        return $this->msg;
    }
    public function getMsgStr($joinStr = "\r\n")
    {
        return join($joinStr, $this->msg);
    }
}