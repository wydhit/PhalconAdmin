<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-06-20
 * Time: 14:29
 */

namespace Admin\Controllers;


use Common\Controllers\BaseController;

class GoodsController extends AdminController
{

    public function listAction()
    {
        return $this->sendJson('error', '执行错误', ['a' => 'a', 'asdf', 'a市地方', 1, 3242]);
    }

}