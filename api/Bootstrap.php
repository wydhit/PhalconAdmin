<?php

namespace Api;

use Common\Core\DoException;
use Common\Core\HandlerException;
use Phalcon\Cache\BackendInterface;
use Phalcon\Config;
use Phalcon\Debug;
use Phalcon\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\Application;
use Phalcon\Mvc\Router;
use Phalcon\Mvc\Router\Group;
use Phalcon\Mvc\Url;
use Phalcon\Mvc\View;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Common\Core\Cookies;
use \Common\Core\Bootstrap as BaseBootstrap;


class Bootstrap extends BaseBootstrap
{
    public $allModules=[];
    function __construct(Loader $loader)
    {
        $this->loader = $loader;
        $this->rootPath = ROOT_PATH;
        $this->projectPath = PROJECT_PATH;
        $this->initConfig();
        define('APP_DEBUG', $this->config->get('debug', false));
        $this->registerService();
    }


    public function run()
    {
        $application = new \Common\Core\Application($this->di);
        $application->useImplicitView(false);
        $this->allModules=require(PROJECT_PATH.'config/modules.php');
        if($this->allModules){
            $application->registerModules($this->allModules);
        }
        $this->registerRouter($application);
        $application->handle()->send();
    }

    public function initConfig()
    {
        /*缓存配置文件*/
       /* $configCacheFile=$this->projectPath . '/config/configCache.php';
        if(file_exists($configCacheFile)){
            $config= new Config(require $configCacheFile);
        }else{*/
            $config = parent::initConfig();
            if (file_exists($this->projectPath . '/config/config.php')) {
                $tmpConfig = require $this->projectPath . '/config/config.php';
                $config->merge($tmpConfig);
                unset($tmpConfig);
            }
            if (file_exists($this->projectPath . '/config/local.config.php')) {
                $tmpConfig = require($this->projectPath . '/config/local.config.php');
                $config->merge($tmpConfig);
                unset($tmpConfig);
            }
       /*     file_put_contents($configCacheFile, "<?php\r\n return " . var_export($config->toArray(), true) . ';');
        }*/
        $this->config = $config;
        return $config;
    }

    public function registerRouter($application)
    {
        //控制器分层需要在这里注册下目录 这是url地址出现的字符 为保持命名空间一致 实际目录应该首字母大写
        $dirController=[/* 'finance', 'userxxx', 'access'*/];
        $router = new \Phalcon\Mvc\Router(false);
        $router->removeExtraSlashes(true);
        $router->setDefaultNamespace(__NAMESPACE__.'\Controllers');
        $router->setDefaultController('index');
        $router->setDefaultAction('index');
        /*默认路由*/
        $router->add('/', array(
            'controller' => 'index',
            'action' => 'index',
            'params' => ''
        ));
        $router->add('/:controller', array(
            'controller' => 1,
            'action' => 'index',
            'params' => ''
        ));
        $router->add('/:controller/:action/:params', array(
            'controller' => 1,
            'action' => 2,
            'params' => 3
        ));
        $router->add('/:controller/:action/:params', array(
            'controller' => 1,
            'action' => 2,
            'params' => 3
        ));
        /*控制器分层路由*/
        if (!empty($dirController) && is_array($dirController)) {
            foreach ($dirController as $value) {
                if (!is_string($value)) {
                    continue;
                }
                $group= new \Phalcon\Mvc\Router\Group([
                    'namespace' => __NAMESPACE__.'\Controllers\\' . ucfirst($value),
                    'controller' => 'index',
                    'action' => 'index'
                ]);
                $group->setPrefix('/'.$value);
                $group->add('',[]);
                $group->add('/:controller',['controller' => 1]);
                $group->add('/:controller/:action',['controller' => 1,'action'=>2]);
                $group->add('/:controller/:action/:params',['controller' => 1,'action'=>2,'params'=>3]);
                $router->mount($group);
                unset($group);
            }
        }
        /*多模块路由*/
        foreach ($application->getModules() as $key => $module) {
            $namespace = $module["namespace"];
            $router->add('/'.$key, array(
                'namespace' => $namespace,
                'module' => $key,
                'controller' => 'index',
                'action' => 'index',
                'params' => ''
            ));
           $router->add('/'.$key.'/:controller', array(
                'namespace' => $namespace,
                'module' => $key,
                'controller' => 1,
                'action' => 'index',
                'params' => ''
            ));
            $router->add('/'.$key.'/:controller/:action/:params', array(
                'namespace' => $namespace,
                'module' => $key,
                'controller' => 1,
                'action' => 2,
                'params' => 3
            ));
        }
        /*更多路由*/
        $router->notFound([
            'controller' => 'admin',
            'action' => 'notFound',
        ]);
//        /**
//         *
//         * @var $router \Phalcon\Mvc\Router
//         */
//        $router=require (PROJECT_PATH.'config/router.php');
        $this->di->setShared('router', $router);
        return $router;
    }

    /**
     * 注册服务
     */
    public function registerService()
    {
        $di = parent::registerService();
        /*注册自动加载器方便在别的地方再试使用*/
        $di->setShared('loader', $this->loader);
        /*url服务*/
        $di->setShared('url', function () use ($di) {
            $url = new Url();
            $url->setBaseUri($di->get('config')->get('application')->baseUri);
            return $url;
        });
        $this->di = $di;
    }

}