<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-06-27
 * Time: 11:00
 */

namespace Common\Forms;

use Common\Core\BaseInjectable;
use Common\Traits\ErrMsg;
use Phalcon\Di;
use Phalcon\Di\Injectable;

class BaseForm extends BaseInjectable
{
    use ErrMsg;

}