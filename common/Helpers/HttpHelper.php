<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-07-25
 * Time: 9:44
 */

namespace Common\Helpers;

use Phalcon\Di;

class HttpHelper
{
    public static function isReturnJson()
    {
        return Di::getDefault()->get('request')->getBestAccept() === 'application/json';
    }

}