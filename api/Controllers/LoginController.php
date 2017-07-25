<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-07-12
 * Time: 14:22
 */

namespace Api\Controllers;
use Common\Models\WeUser;

class LoginController extends ApiController
{

    public function usrNameAction($userName='',$pwd='')
    {
        /**
         * 登录返回信息
         *token 作用类似于sessionId 登录后记录在user表里
         *tokenOutTime token有效期  在这之前有效  默认1个月
         *secretKey  密匙用于加密数据
         *
         * redis里记录信息
         * 'token'=>[
         * 'loginTime'
         * 'tokenOutTime'=>''
         * 'secretKey'=>''
         * 'userInfo'=>[]
         * 'userId'=>11
         * ]
         *
         */

    }

}