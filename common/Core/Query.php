<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-07-06
 * Time: 14:20
 */

namespace Common\Core;


use Phalcon\Mvc\Model\Resultset\Complex;
use Phalcon\Mvc\Model\Resultset\Simple;

class Query extends \Phalcon\Mvc\Model\Query
{

    /**
     * @param null $bindParams
     * @param null $bindTypes
     * @return Simple |Complex
     */
    public function executeXX($bindParams = null, $bindTypes = null)
    {

//        $uniqueRow = $this->_uniqueRow;
//        $intermediate = $this->parse();
//        $type = $this->_type;
//        var_dump($type);
        return parent::execute($bindParams, $bindTypes);
    }

}