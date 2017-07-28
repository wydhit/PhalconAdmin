<?php

namespace Common\Core;

use Admin\Modules\User\Models\User;
use Phalcon\Config;
use Phalcon\Di;
use Phalcon\DiInterface;
use Phalcon\DispatcherInterface;
use Phalcon\Events\Event;
use Phalcon\Events\Manager;
use Phalcon\Loader;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\Model;

class Bootstrap
{
    /**
     * @var $config Config;
     */
    public $config = null;
    /**
     * @var $loader \Phalcon\Loader
     */
    public $loader = null;
    /**
     * @var $di DiInterface
     */
    public $di = null;
    function __construct(Loader $loader)
    {
        $this->loader = $loader;
        $this->config=$this->initConfig();/*初始化配置信息*/

        define('APP_DEBUG', $this->config->get('debug', false));
        $this->registerExceptionHandle();

        $this->di = $this->registerService();

    }
    public function run()
    {

        $application = new \Common\Core\Application($this->di);
        $application->useImplicitView(false);/*禁用自动视图*/
        $this->registerModule($application);
        $this->registerRouter($application);

        if (APP_DEBUG && $this->config->get('Debugbar')) {/*调试用的debug条*/
            $this->di['app'] = $application;
            (new \Snowair\Debugbar\ServiceProvider(COMMON_PATH . '/config/debugger_config.php'))->start();
        }

        $application->handle()->send();

    }

    public function registerRouter($application)
    {
        $router = new \Phalcon\Mvc\Router(false);
        $router->removeExtraSlashes(true);
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
        return $router;
    }

    public function registerExceptionHandle()
    {
        /*注册错误处理*/
        $ExceptionHandler = new \Common\Core\ExceptionHandler();
        $ExceptionHandler->setDebug(APP_DEBUG);
        $ExceptionHandler->listen();
    }

    /*注册模块*/
    public function registerModule($application)
    {
        if (file_exists(PROJECT_PATH . '/config/modules.php')) {
            $allModules = require(PROJECT_PATH . '/config/modules.php');
            if ($allModules) {
                $application->registerModules($allModules);
            }
        }
    }

    /*注册基本服务*/
    public function registerService()
    {
        $di  = new \Phalcon\DI\FactoryDefault();
        $config = $this->config;
        $di->setShared('config', $config);
        /*事件管理器*/
        $di->setShared('eventManager', function () {
            $eventManager = new \Phalcon\Events\Manager();
            return $eventManager;
        });
        /*数据库服务*/
        $di->setShared('db', function () use ($config) {
            $dbConfig = $config->get('database')->toArray();
            $adapter = $dbConfig['adapter'];
            unset($dbConfig['adapter']);
            $class = 'Phalcon\Db\Adapter\Pdo\\' . $adapter;
            $db = new $class($dbConfig);
            $db->setEventsManager($this->get('eventManager'));
            return $db;
        });
        /*路由服务*/
        $di->setShared('router', function () use ($di) {
            $router = new \Phalcon\Mvc\Router();
            $router->removeExtraSlashes(true);
            return $router;
        });
        $di->setShared('url', function () use ($config) {
            $url = new \Phalcon\Mvc\Url();
            $url->setBaseUri($config->get('application')->baseUri);
            return $url;
        });
        /*模型元数据*/
        $di->setShared('modelsMetadata', function () {
            return new \Phalcon\Mvc\Model\Metadata\Memory();
        });
        /*加密解密*/
        $di->setShared('crypt', function () {
            $crypt = new \Phalcon\Crypt();
            $crypt->setKey('%3171e$i86e$f!8ja1');
            return $crypt;
        });
        /*日志*/
        $di->setShared('logger', function () {
            $logger = new \Phalcon\Logger\Multiple();
            $loggerPath = PROJECT_PATH .DIRECTORY_SEPARATOR. 'logs' . DIRECTORY_SEPARATOR . date("Y") . DIRECTORY_SEPARATOR;
            if (!is_dir($loggerPath)) {
                mkdir($loggerPath, 0777);
            }
            $textLogger = new \Phalcon\Logger\Adapter\File($loggerPath . date('Y-m-d') . '.log');
            $logger->push($textLogger);
            if (APP_DEBUG) {
                $logger->push(new \Phalcon\Logger\Adapter\Firephp());
            }
            return $logger;
        });
        /*缓存*/
        $di->setShared('cache', function () {
            $frontCache = new \Phalcon\Cache\Frontend\Data(['lifetime' => '172800']);
            $cacheDir = PROJECT_PATH .DIRECTORY_SEPARATOR. 'cache' . DIRECTORY_SEPARATOR;
            $cache = new \Phalcon\Cache\Backend\File($frontCache, ['cacheDir' => $cacheDir]);
            return $cache;
        });
        $di->setShared('dispatcher', function () use ($di) {
            $eventManager = $this->get('eventManager');
            $eventManager->attach('dispatch:beforeDispatchLoop', function (Event $event, Dispatcher $dispatcher) use ($di) {
                $controllerName = $dispatcher->getControllerClass();
                $actionName = $dispatcher->getActiveMethod();
                if (!method_exists($controllerName, $actionName)) {
                    return ;
                }
                $ref = new \ReflectionMethod($controllerName, $actionName);
                $parameters = $ref->getParameters();
                $params = [];
                foreach ($parameters as $k => $parameter) {
                    if (isset($parameter->getClass()->name)) {//类形式的 类型约束
                        $className = $parameter->getClass()->name;
                        /*如果继承Model 特殊处理下*/
                        if (is_subclass_of($className, Model::class)) {
                            $id = $dispatcher->getParam($k, 'int', 0);
                            if ($id) {
                                $model = $className::findFirst($id);
                            } else {
                                $model = null;
                            }
                            if ($model instanceof Model) {
                                $params[] = $model;
                            } elseif ($parameter->allowsNull()) {
                                $params[] = null;
                            } else {
                                $params[] = $di->get($className);
                            }
                        } else {
                            $classNames = explode('\\', $className);
                            $defaultService = strtolower(end($classNames));
                            /*看看是不是默认的几个基本服务*/
                            if ($di->has($defaultService)) {
                                $params[] = $di->getShared($defaultService);
                            } else {
                                $params[] = $di->getShared($className, [$dispatcher->getParam($k)]);
                            }
                        }
                    } else {
                        $params[] = $dispatcher->getParam($k);
                    }
                }
                $dispatcher->setParams($params);
            });
            $dispatcher = new Dispatcher();
            $dispatcher->setEventsManager($eventManager);
            return $dispatcher;
        });

        $di->setShared('validation',function (){
            return new BaseValidation();
        });

        return $di;
    }

    /**
     * 初始化公共配置信息
     * @return Config
     */
    public function initConfig()
    {
        /*缓存配置文件*/
        $configCacheFile = PROJECT_PATH . '/config/config_cache.php';
        if (file_exists($configCacheFile) && true) {
            $config = new Config(require $configCacheFile);
        } else {
            /**
             * @var $config Config;
             */
            /*公共配置文件*/
            $config = require COMMON_PATH . '/config/config.php';
            if (file_exists(COMMON_PATH . '/config/local.config.php')) {
                $local_configs = require(COMMON_PATH . '/config/local.config.php');
                $config = $config->merge($local_configs);
                unset($local_configs);
            }
            /*项目配置文件*/
            if (file_exists(PROJECT_PATH . '/config/config.php')) {
                $tmpConfig = require PROJECT_PATH . '/config/config.php';
                $config->merge($tmpConfig);
                unset($tmpConfig);
            }
            if (file_exists(PROJECT_PATH . '/config/local.config.php')) {
                $tmpConfig = require(PROJECT_PATH . '/config/local.config.php');
                $config->merge($tmpConfig);
                unset($tmpConfig);
            }
            file_put_contents($configCacheFile, "<?php\r\n return " . var_export($config->toArray(), true) . ';');
        }
        return $config;
    }


}