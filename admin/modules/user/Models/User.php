<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-07-04
 * Time: 8:20
 */

namespace Admin\Modules\User\Models;


use Common\Models\WeUser;

class User extends WeUser
{
    public function getTopUser()
    {
        return self::find(['id<200'])->toArray();

    }
}