<?php

namespace Admin\Modules\User\Controllers;

use Admin\Controllers\AdminController;
use Admin\Modules\User\Models\TopUserSearch;
use Admin\Modules\User\Models\User;

class IndexController extends AdminController
{

    public function indexAction()
    {
        $user=new User();
        $result=$user->getTopUser();
        $this->addData('rs',$result);
        return $this->render();
    }

    public function listAction()
    {
        $comGoodsSearch=TopUserSearch::N();
        $goods= $comGoodsSearch->TopUserForGrid($this->request);
        if($goods){
            $this->logger->alert(json_encode($this->request->get(null)));
            return $this->sendJsonForDateGrid($goods['data'],$goods['count'],null,null,$goods['searchData']);
        }else{
            return $this->sendErrorJson($comGoodsSearch->getMsgStr());
        }
        
    }

}

