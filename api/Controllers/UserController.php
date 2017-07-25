<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-07-12
 * Time: 14:22
 */

namespace Api\Controllers;


use Common\Controllers\BaseController;
use Common\Models\WeUser;

class UserController extends ApiController
{

    public function indexAction(WeUser $user=null)
    {
        if($user!==null){
            $this->sendSuccessJson('ok',$user);
        }else{
            $this->sendErrorJson('找不到会员信息');
        }

    }

}