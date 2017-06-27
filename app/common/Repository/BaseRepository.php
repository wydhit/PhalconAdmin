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

use Common\Core\BaseInjectable;
use Common\Traits\ErrMsg;

class BaseRepository extends BaseInjectable
{
    use ErrMsg;
    protected $SESSION_BASE = 'admin_';

}