<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-06-20
 * Time: 14:29
 */

namespace Admin\Controllers;

use Common\Models\WeGoods;
use Common\Search\ComGoodsSearch;
use Phalcon\Http\Request;

class GoodsController extends AdminController
{

    public function listAction()
    {
        $comGoodsSearch = ComGoodsSearch::N();
        $goods = $comGoodsSearch->comGoodsListForGrid($this->request);
        if ($goods) {
            return $this->sendJsonForDateGrid($goods['data'], $goods['count'], null, null, $goods['searchData']);
        } else {
            return $this->sendErrorJson($comGoodsSearch->getMsgStr());
        }
    }


    public function editAction(WeGoods $goods = null, Request $request)
    {
        if ($goods === null) {
            return $this->errorEnd('参数错误！');
        }
        if ($this->request->isPost() && $this->checkCsrfToken()) {
            /*自动调用输入验证器*/
            $this->validationInput($request->get());
            /*保存数据*/
            $goods->assign($request->get(), '', ['title']);
            if ($goods->save([],'preimg')) {
                return $this->sendSuccessJson('执行成功1');
            } else {
                return $this->sendErrorJson('添加失败',[],$goods->getErrInput());
            }
        } else {
            $this->setCsrfToken();
            $this->addData('goods', $goods);
            $this->addData('validationJs', $this->getValidationRulesForJs());
            $this->tag->setDefaults($goods->toArray());
            return $this->actionRender();
        }
    }

    public function addAction(WeGoods $goods)
    {
        if ($this->request->isPost()) {
          $this->validationInput();
            $goods->assign($this->request->getPost(null));
            if ($goods->save()) {
                return $this->sendSuccessJson('添加成功1');
            } else {
                return $this->sendErrorJson('添加失败',[],$goods->getErrInput());
            }
        } else {
            $this->addData('validationJs', $this->getValidationRulesForJs());
            return $this->actionRender();
        }
    }

    public function indexAction()
    {
        return $this->actionRender();
    }

}