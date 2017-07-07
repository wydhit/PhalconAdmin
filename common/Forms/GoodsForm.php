<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-06-29
 * Time: 11:28
 */

namespace Common\Forms;
use Phalcon\Forms\Element\Check;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;


class GoodsForm extends BaseForm
{

    public function initialize($goods,$option)
    {
        $this->add(new Hidden('id'));
        $this->add(new Text('ic'));
        $this->add(new Text('title'));
        $this->add(new Hidden('preimg'));
        $this->add(new Hidden('bigimg'));
        $this->add(new TextArea('content'));
        $this->add(new Text('readme'));
        $this->add(new Text('comid'));
        $this->add(new Check('isgroup'));
        $this->add(new Text('mygroup'));
        $this->add(new Text('inventories'));
        $this->add(new Text('inventoriessum'));
        $this->add(new Text('inventoriesalarm'));
        $this->add(new Text('base_price'));
        $this->add(new Text('sysbizer_id'));
        $this->add(new Text('class_id'));
        $this->add(new Text('comClass_id'));
    }
}