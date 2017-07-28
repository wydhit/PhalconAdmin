<?php

namespace Common\Models;


class className  /*$extends*/
{
/*$fields*/

    /*初始化*/
    public function initialize()
    {

    }

    public function prepareSave()
    {
        /* 验证前的预置操作*/
    }

    /*验证*/
    public function validation()
    {
        /*$validator=$this->getDI()->get('validation');*/
        /*$validator->add('title',new PresenceOf(['message'=>'名称不能为空']));*/
        /*$validator->add('title',new StringLength(['min'=>3,'max'=>100,'messageMaximum'=>'名称不能长于:max字符']));*/
        /*return $this->validate($validator);*/
    }

    public function getSource()
    {
        return 'tableName';
    }

    /**
     * @param mixed $parameters
     * @return className[]|className|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * @param mixed $parameters
     * @return className|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }


}