<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2017-06-21
 * Time: 17:25
 */

namespace Common\Services;

use Phalcon\Di;
use Phalcon\Di\Injectable;

class BaseService extends Injectable
{
    /**
     * @var $di Di\FactoryDefault null
     */
    public $di = null;
    protected $SESSION_BASE = 'mc_';
    public function initialize()
    {
    }
    public function setDI(\Phalcon\DiInterface $dependencyInjector)
    {   parent::setDI($dependencyInjector);
        $this->initialize();
    }

}