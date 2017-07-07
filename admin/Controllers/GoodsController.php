<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-06-20
 * Time: 14:29
 */

namespace Admin\Controllers;

use Common\Forms\GoodsForm;
use Common\Models\WeGoods;
use Common\Repository\UserRepository;
use Common\Search\ComGoodsSearch;

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

    public function editAction(WeGoods $goods = null)
    {
        if ($this->request->isAjax() && $this->request->get('dataType') !== 'html') {
            if (empty($goods)) {
                return $this->sendErrorJson('参数错误');
            }
            $goods->assign($this->request->getPost(null));
            if ($goods->save()) {
                return $this->sendSuccessJson('执行成功1');
            } else {
                return $this->sendErrorJson('修改失败');
            }

        } else {
            if ($goods === null) {
                return $this->msg('参数错误', '', '', false);
            }
            $this->addData('goods', $goods);
            $this->tag->setDefaults($goods->toArray());
            return $this->actionRender();
        }
    }

    public function addAction(WeGoods $goods)
    {

        if ($this->request->isAjax() && $this->request->get('dataType') !== 'html') {
            $goods->assign($this->request->getPost(null));
            if ($goods->save()) {
                return $this->sendSuccessJson('执行成功1');
            } else {
                return $this->sendErrorJson('修改失败');
            }
        } else {
            return $this->actionRender();
        }

    }

    public function indexAction()
    {
        return $this->actionRender();
    }

}