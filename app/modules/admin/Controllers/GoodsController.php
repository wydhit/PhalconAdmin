<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-06-20
 * Time: 14:29
 */

namespace Admin\Controllers;

use Common\Repository\UserRepository;
use Common\Search\ComGoodsSearch;

class GoodsController extends AdminController
{

    public function listAction()
    {
        $comGoodsSearch=ComGoodsSearch::N();
        $goods= $comGoodsSearch->comGoodsListForGrid($this->request);
        if($goods){
            $this->logger->alert(json_encode($this->request->get(null)));
            return $this->sendJsonForDateGrid($goods['data'],$goods['count'],null,null,$goods['searchData']);
        }else{
            return $this->sendErrorJson($comGoodsSearch->getMsgStr());
        }
    }

    public function editAction($id=0)
    {
        var_dump( UserRepository::N()->getAdminInfo());
        var_dump( UserRepository::N()->getAdminInfo());
        return $this->actionRender();
    }
    public function indexAction()
    {
        return $this->actionRender();
    }

}