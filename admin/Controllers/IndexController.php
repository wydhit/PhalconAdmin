<?php

namespace Admin\Controllers;


use Common\Controllers\BaseController;
use Common\Models\WeOrder;
use Phalcon\Http\Request;


class IndexController extends AdminController
{

    public function indexAction()
    {
        $this->addData('order', WeOrder::findFirst());
        return $this->render();

    }

}