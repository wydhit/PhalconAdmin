<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-06-27
 * Time: 11:36
 */
/**
 * 返回业务逻辑信息 一般用于错误信息的返回
 */
namespace Common\Traits;


trait ErrMsg
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