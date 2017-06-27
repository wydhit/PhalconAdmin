<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-06-27
 * Time: 10:57
 */

namespace Common\Forms;


use Common\Models\WeComgoods;
use Common\Traits\SearchForGrid;
use Phalcon\Http\Request;
use Phalcon\Paginator\Adapter\QueryBuilder;

class ComGoodsSearch extends BaseForm
{
    use SearchForGrid;
    public $title;
    public $isgroup;

    public function comGoodsListForGrid(Request $request)
    {
        $this->SearchParamInit($request);
        /*搜索处理区*/
        $builder = $this->modelsManager->createBuilder()
            ->from(['comgoods' => 'Common\Models\WeComgoods'])
            ->columns([
                'id' => 'comgoods.id',
                'title' => 'goods.title',
                'preimg' => 'goods.preimg'
            ])
            ->leftJoin('Common\Models\WeGoods', 'goods.id=comgoods.goodsid', 'goods');
        if ($this->title) {
            if(strlen($this->title)>200){
                $this->addMsg('标题过长');
                return false;
            }
            $builder->andWhere('goods.title like :title:', ['title' => "%{$this->title}%"]);
        }
        if($this->isgroup!==null){
            $builder->andWhere('goods.isgroup=:isgroup:',['isgroup'=>$this->isgroup]);
        }
        /*搜索处理区结束*/

        /*通用处理方式*/
        $builder->orderBy("$this->sidx $this->sord");
        $paginator = (new QueryBuilder([
            "builder" => $builder,
            "limit" => $this->rows,
            "page" => $this->page
        ]))->getPaginate();
        $this->gridReturnData = $paginator->items->toArray();
        $this->gridReturnCount = $paginator->total_items;
        return $this->returnGridData();
    }


}