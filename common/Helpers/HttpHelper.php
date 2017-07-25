<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-07-25
 * Time: 9:44
 */

namespace Common\Helpers;

use Phalcon\Di\FactoryDefault;

class HttpHelper
{
    public static function isReturnJson()
    {
        return FactoryDefault::getDefault()->get('request')->getBestAccept() === 'application/json';
    }

}