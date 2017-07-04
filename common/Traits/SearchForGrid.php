<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-06-27
 * Time: 11:05
 */

namespace Common\Traits;


use Phalcon\Http\Request;

trait SearchForGrid
{
    public $page;
    public $rows;
    public $sidx;
    public $sord;
    public $searchData = [];
    public $gridReturnData = [];
    public $gridReturnCount = 0;

    public function searchParamInit(Request $request)
    {
        $this->page = $request->get('page', 'int', 1);
        $this->rows = $request->get('rows', 'int', 10);
        $this->sidx = $request->get('sidx', 'string', 'id');
        $this->sord = $request->get('sord', 'string', 'desc');
        $this->searchData = $request->get('searchData');
        if (!empty($this->searchData) && is_array($this->searchData)) {
            foreach ($this->searchData as $k => $data) {
                $data=trim($data);
                if (is_string($data) && $data === '') {
                    $data = null;
                }
                $this->$k =$data;
            }
        }
    }

    public function returnGridData()
    {
        return [
            'data' => $this->gridReturnData,
            'count' => $this->gridReturnCount,
            'searchData' => $this->searchData
        ];

    }

}