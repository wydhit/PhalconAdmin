<?php

namespace Admin\Controllers;


use Common\Controllers\BaseController;
use Common\Models\WeComgoods;
use Common\Models\WeOrder;
use Phalcon\Http\Request;
use Phalcon\Image;
use Phalcon\Image\Adapter\Imagick;


class IndexController extends AdminController
{

    public function indexAction()
    {

//        $as=$this->db->fetchAll('select * from we_hotelguestinfo  WHERE orderid=17173');
//
//
//        foreach ($as as $a) {
//           echo '<img width=16% src="data:image/png;base64,'.$a['guestimg'].'">';
//           echo '<img width=16% src="data:image/png;base64,'.$a['guestphoto'].'">';
//
////            file_put_contents('img',base64_decode($a['guestimg']));
////            file_put_contents('img',base64_decode($a['guestphoto']));
////            $img=new \Phalcon\Image\Adapter\Gd(PROJECT_PATH.'public/img');
////            echo $img->getMime();
//
//        }





        //$alias='goods';
        //$comGoods=WeComgoods::findWithAlias($alias,['limit'=>100]);
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