<?php
namespace Admin\Controllers\Finance;
use Admin\Controllers\AdminController;

/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-07-03
 * Time: 15:43
 */
class IndexController extends AdminController
{
    public function indexAction()
    {
        return $this->actionRender([],'finance/index');
    }

}