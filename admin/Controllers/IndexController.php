<?php

namespace Admin\Controllers;


use Common\Controllers\BaseController;
use Common\Models\WeComgoods;
use Common\Models\WeOrder;
use Phalcon\Http\Request;


class IndexController extends AdminController
{

    public function indexAction()
    {
       



        //$alias='goods';
       // $comGoods=WeComgoods::findWithAlias($alias,['limit'=>100]);
//        $comGoods=WeComgoods::find(['limit'=>100]);
       // foreach ($comGoods as $comGood) {
           // echo $comGood->goods->title;
       // }
//         $a=$this->modelsManager->createBuilder()
//            ->from(['wcg'=>'Common\Models\WeComgoods'])
//            ->columns('wcg.*,goods.*')
//            ->leftJoin('Common\Models\WeGoods',null,'goods')
//            ->limit(1)
//            ->getQuery()/*;
//            $cacheKey=md5(serialize($a->parse()));
//            $a=$a->cache(['key'=>$cacheKey,'lifetime'=>10,'service' => 'cache'])*/->execute();
//
//        foreach ($a as $item) {
////            var_dump($item->wcg->id);
////            var_dump($item->goods->id);
//            }
//       // $this->addData('order', WeOrder::findFirst());
        return $this->render();

    }

}