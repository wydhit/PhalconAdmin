<?php

namespace Admin\Controllers;


use Common\Controllers\BaseController;
use Common\Models\WeComgoods;
use Common\Models\WeOrder;
use Phalcon\Http\Request;
use Phalcon\Image;
use Phalcon\Image\Adapter\Imagick;


class IviewController extends AdminController
{

    public function indexAction()
    {        return $this->actionRender();
    }

}