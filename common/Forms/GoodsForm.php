<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-06-29
 * Time: 11:28
 */

namespace Common\Forms;
use Common\Models\WeGoods;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Text;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;


class GoodsForm extends BaseForm
{

    public function initialize($goods,$option)
    {
        $this->add(new Hidden('id'));
        $this->add(new Text('title'));
    }
}