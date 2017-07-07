<?php

namespace Admin\Modules\User\Controllers;

use Admin\Controllers\AdminController;
use Admin\Modules\User\Models\TopUserSearch;
use Admin\Modules\User\Models\User;
use Common\Core\Query;
use Common\Forms\GoodsForm;
use Common\Models\WeOrder;
use Common\Models\WeUser;
use Phalcon\Http\Request;
use Phalcon\Http\Response;

class IndexController extends AdminController
{

    public function indexAction($user, $id = 0, $order)
    {

        $a = new Query('select id as count,c.* from Common\Models\WeGoods as c WHERE id > 0 limit 1', $this->di);
        $a = $a->execute();



//        foreach ($a as $item) {
//            var_dump($item->c->id);
//            //var_dump($item->toArray());
////            echo $item->save(['base_price'=>0]);
//        }
//        var_dump($a);
//       var_dump($a->toArray());
//        var_dump($this->db->decrementAboveZero('we_order','allprice',1,'id=9423'));
        //$a=$this->db->fetchAll('select * from we_order  where id <0 limit 5',\Phalcon\Db::FETCH_OBJ,['id'=>5]);
//        $a=$this->db->getInternalHandler()->prepare('select * from we_order where id < 0');
//        $a=$a->execute();
        /* var_dump(gettype($a));
         var_dump($a);
         $a=$this->modelsManager->createBuilder()
             ->from('Common\Models\WeComgoods')
             ->columns([
                 'id'=>'Common\Models\WeComgoods.id'
             ])
             ->leftJoin('Common\Models\WeGoods','Common\Models\WeGoods.id=Common\Models\WeComgoods.goodsid')
             ->limit(5)->getQuery()->execute();
         foreach ($a as $v){
         }

         $b=$a->filter(function ($aa){
                  $aa->id.="===";
                  return $aa;
         });

         foreach ($b as $v){

             }*/

        /*$result = $user->getTopUser();
        $this->addData('rs', $result);*/
        return $this->render();
    }

    public function listAction(TopUserSearch $topUserSearch, Request $request)
    {
        $goods = $topUserSearch->TopUserForGrid($request);
        if ($goods) {
            $this->logger->alert(json_encode($request->get(null)));
            return $this->sendJsonForDateGrid($goods['data'], $goods['count'], null, null, $goods['searchData']);
        } else {
            return $this->sendErrorJson($topUserSearch->getMsgStr());
        }
    }

    public function testAction(Request $request, Response $response, WeUser $user = null)
    {
        $host = $request->getHttpHost();
        return $response->setContent($host);
    }

    public function editAction(WeUser $user = null)
    {
        if (empty($user)) {
            return '参数错误';
        }

    }

}

