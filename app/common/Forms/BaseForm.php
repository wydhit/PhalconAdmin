<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-06-27
 * Time: 11:00
 */

namespace Common\Forms;

use Common\Traits\ErrMsg;
use Phalcon\Di;
use Phalcon\Di\Injectable;

class BaseForm extends Injectable
{   use ErrMsg;
    /**
     * @var $di Di\FactoryDefault null
     */
    public $di = null;

    public function initialize()
    {
    }

    public function setDI(\Phalcon\DiInterface $dependencyInjector)
    {
        parent::setDI($dependencyInjector);
        $this->initialize();
    }
    /**
     *
     * @param $forceNew bool 是否强制返回一个新的实例
     * @return static
     */
    public static function N($forceNew = false)
    {
        if ($forceNew) {
            $class = new  static();
            $class->setDI(Di::getDefault());
            return $class;
        } else {
            return Di::getDefault()->getShared(get_called_class());
        }
    }

}