<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-06-27
 * Time: 14:42
 */

namespace Common\Core;


use Phalcon\Di\FactoryDefault;
use Phalcon\Di\Injectable;
use Phalcon\Di;

/**
 * Class BaseInjectable
 * @package Common\Core
 *
 */
class BaseInjectable extends Injectable
{
    /**
     * @var $di FactoryDefault null
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