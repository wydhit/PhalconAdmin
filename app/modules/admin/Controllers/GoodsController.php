<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-06-20
 * Time: 14:29
 */

namespace Admin\Controllers;


use Common\Controllers\BaseController;
use Common\Forms\ComGoodsSearch;
use Common\Models\WeComgoods;
use Common\Repository\UserRepository;

class GoodsController extends AdminController
{

    public function listAction()
    {

        $comGoodsSearch=ComGoodsSearch::N();
        $goods= $comGoodsSearch->comGoodsListForGrid($this->request);
        if($goods){
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