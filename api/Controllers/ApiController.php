<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-07-12
 * Time: 14:23
 */

namespace Api\Controllers;


use Common\Controllers\BaseController;
use Common\Core\Exception\UserException;

class ApiController extends BaseController
{
    public function beforeExecuteRoute(){
//        $this->checkToken();
//        $this->checkSign();
    }

    public function checkToken()
    {
        $token=$this->request->get('token');
        if(!$token){
            throw new UserException('登录超时！,请重新登录');
        }else{
            $this->userinfo=$this->getUserInfo($token);
        }
    }
    public function getUserInfo($token='')
    {
        return ['id'=>1123,'name'=>'张三'];
    }
    public function checkSign()
    {
        $sign=$this->request->get('sign');

    }


}