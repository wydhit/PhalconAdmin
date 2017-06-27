<?php
/**
 *
 * 介于controller和model之间的服务层
 * 一般用于1、与数据库无关的逻辑处理 2、需要多个model联合处理的逻辑
 * 一个服务中应该不存在公共属性 各个方法相对独立除了可以相互调用应该没有公共属性
 * 服务推荐单例来使用
 * UserService::N()->getUser($id)  推荐这种用  这种方法实际返回的是一个单例
 * Date: 2017-06-21
 * Time: 17:25
 */

namespace Common\Repository;

use Common\Traits\ErrMsg;
use Phalcon\Di;
use Phalcon\Di\Injectable;

class BaseRepository extends Injectable
{
    use ErrMsg;
    protected $SESSION_BASE = 'admin_';
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