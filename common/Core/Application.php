<?php

namespace Common\Core;

use Phalcon\Di\FactoryDefault;
use Phalcon\DiInterface;
use Phalcon\Exception;
use \Phalcon\Mvc\Application as phalconApplication;
use Phalcon\Http\ResponseInterface;
use Phalcon\Mvc\Router\Route;

class Application extends phalconApplication
{
    public function __construct(DiInterface $dependencyInjector = null)
    {
        parent::__construct($dependencyInjector);
        $this->useImplicitView(false);
    }

    /*调试用*/
    public function handleX($uri = null)
    {
        $di = $this->getDI();
        /**
         * @var $router \Phalcon\Mvc\Router
         */
        $router = $di->getShared('router');
        $router->handle($uri);
        $matchedRoute = $router->getMatchedRoute();
        echo '<pre>';
        var_dump($matchedRoute);



        if (gettype($matchedRoute) === 'object') {
            $match = $matchedRoute->getMatch();
            if ($match !== null) {
                $possibleResponse = call_user_func_array($match, $router->getParams());
                if (is_string($possibleResponse)) {
                    $response = $di->get('response');
                    $response->setContent($possibleResponse);
                    return $response;
                } elseif (gettype($possibleResponse) === 'object' && $possibleResponse instanceof ResponseInterface) {
                    $possibleResponse->sendHeaders();
                    $possibleResponse->sendCookies();
                    return $possibleResponse;
                }
            }
        }

        $moduleName = $router->getModuleName();
        $moduleName = empty($moduleName) ? $this->_defaultModule : $moduleName;
        $moduleObject = null;
        if($moduleName){
            $module = $this->getModule($moduleName);
            if (is_array($module)) {
                $className = isset($module['className']) ? $module['className'] : 'Module';
                if ($path = isset($module['path']) ? $module['path'] : '') {
                    if (!class_exists($className)) {
                        if (!file_exists($path)) {
                            throw new \Exception("Module definition path '" . $path . "' doesn't exist");
                        }
                        require $path;
                    }
                }

                $moduleObject = $di->get($className);
                $moduleObject->registerAutoloaders($di);
                $moduleObject->registerServices($di);
            } else {
                if (!($module instanceof \Closure)) {
                    throw new \Exception("Invalid module definition");
                }
                $moduleObject = call_user_func_array($module, [$di]);
            }
        }

        $dispatcher = $di->get('dispatcher');
        $dispatcher->setModuleName($router->getModuleName());
        $dispatcher->setNamespaceName($router->getNamespaceName());
        $dispatcher->setControllerName($router->getControllerName());
        $dispatcher->setActionName($router->getActionName());
        $dispatcher->setParams($router->getParams());


        $controller = $dispatcher->dispatch();
        $possibleResponse = $dispatcher->getReturnedValue();
        $response=$di->get('response');
        if (is_string($possibleResponse)){
            $response->setContent($possibleResponse);
        }
        return $response;
    }

}