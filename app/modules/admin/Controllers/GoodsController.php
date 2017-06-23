<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-06-20
 * Time: 14:29
 */

namespace Admin\Controllers;


use Common\Controllers\BaseController;
use Common\Models\WeComgoods;

class GoodsController extends AdminController
{

    public function listAction()
    {
        $page = $this->request->get('page', 'int', 1);
        $rows = $this->request->get('rows', 'int', 10);
        $sidx = $this->request->get('sidx', 'string', 'id');
        $sord = $this->request->get('sord', 'string', 'asc');
//        return $this->sendJson('error', '执行错误', ['a' => 'a', 'asdf', 'a市地方', 1, 3242]);
        $goods=WeComgoods::query()
            ->columns([
                'id'=>'Common\Models\WeComgoods.id',
                'title'=>'Common\Models\WeGoods.title',
                'preimg'=>'Common\Models\WeGoods.preimg'
            ])
            ->leftJoin('Common\Models\WeGoods','Common\Models\WeGoods.id=Common\Models\WeComgoods.goodsid')
            ->limit(10)
            ->execute()
            ->toArray();
        $total=WeComgoods::count();
        return $this->sendJsonForDateGrid($goods,$total);

    }

    public function editAction($id=0)
    {   echo $id;
        return $this->actionRender();
    }
    public function indexAction()
    {
        return $this->actionRender();
    }

}