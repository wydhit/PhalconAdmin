<?php

namespace Admin;
use Phalcon\Config;
use Phalcon\Loader;
use Phalcon\Mvc\Url;
use Phalcon\Mvc\View;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Common\Core\Cookies;
use \Common\Core\Bootstrap as BaseBootstrap;

class Bootstrap extends BaseBootstrap
{
    public $allModules=[];

    public function registerRouter($application)
    {
        $router=parent::registerRouter($application);
        $router->setDefaultNamespace(__NAMESPACE__.'\Controllers');
        //控制器分层需要在这里注册下目录 这是url地址出现的字符 为保持命名空间一致 实际目录应该首字母大写
        if(file_exists(PROJECT_PATH.'/config/dir_controller.php')){
            $dirController=require PROJECT_PATH.'/config/dir_controller.php';
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
        /*视图服务*/
        $di->setShared('view', function () {
            $view = new View();
            $view->setViewsDir(__DIR__ . '/views/');
            $view->registerEngines(['.phtml' => 'Phalcon\Mvc\View\Engine\Php']);
            return $view;
        });
        /*url服务*/
        $di->setShared('url', function () use ($di) {
            $url = new Url();
            $url->setBaseUri($di->get('config')->get('application')->baseUri);
            return $url;
        });
        /*session*/
        $di->setShared('session', function () {
            $session = new SessionAdapter();
            $session->setName('mcSessionId');
            $session->start();
            return $session;
        });
        /*cookie*/
        $di->setShared('cookies',function () {
                $cookies = new Cookies();
                $cookies->setExpire(time() + 24 * 60 * 60);
                $cookies->useEncryption(true);
                return $cookies;
            }
        );
        return $di;
    }

}
