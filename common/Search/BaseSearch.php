<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-06-27
 * Time: 14:44
 */

namespace Common\Search;


use Common\Core\BaseInjectable;
use Common\Traits\ErrMsg;
use Common\Traits\SearchForGrid;

class BaseSearch extends BaseInjectable
{
    use ErrMsg;
    use SearchForGrid;

    /**
     * @var $builder \Phalcon\Mvc\Model\Query\BuilderInterface
     */
    public $builder;

    public function initialize()
    {
        $this->builder=$this->modelsManager->createBuilder();
    }

}