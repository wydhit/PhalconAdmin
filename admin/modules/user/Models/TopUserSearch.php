<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-07-04
 * Time: 8:32
 */

namespace Admin\Modules\User\Models;


use Common\Search\BaseSearch;
use Phalcon\Http\Request;
use Phalcon\Paginator\Adapter\QueryBuilder;

class TopUserSearch extends BaseSearch
{

    public function TopUserForGrid( Request $request)
    {
        $this->searchParamInit($request);
        $builder= $this->modelsManager->createBuilder()->from('Common\Models\WeUser');
        $builder->columns('id,u_mobile,u_fullname');
        /*通用处理方式*/
        $builder->orderBy("$this->sidx $this->sord");
        $paginator = (new QueryBuilder([
            "builder" => $builder,
            "limit" => $this->rows,
            "page" => $this->page
        ]))->getPaginate();
        $this->gridReturnData = $paginator->items->toArray();
        $this->gridReturnCount = $paginator->total_items;
//        $this->cache->save($cacheKey,$this->returnGridData(),10);
        return $this->returnGridData();


    }

}