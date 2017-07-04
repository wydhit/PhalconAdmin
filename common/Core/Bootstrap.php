<?php

namespace Common\Core;

use Phalcon\Config;
use Phalcon\Di;
use Phalcon\DiInterface;

class Bootstrap
{
    public $rootPath;
    public $projectPath;
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
    /*注册基本服务*/
    public function registerService()
    {
        $di = new Di\FactoryDefault();
        $config = $this->config;
        $di->setShared('config', $config);
        /*数据库服务*/
        $di->setShared('db', function () use ($config) {
            $dbConfig = $config->get('database')->toArray();
            $adapter = $dbConfig['adapter'];
            unset($dbConfig['adapter']);
            $class = 'Phalcon\Db\Adapter\Pdo\\' . $adapter;
            return new $class($dbConfig);
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
            $loggerPath = PROJECT_PATH . 'logs' . DIRECTORY_SEPARATOR . date("Y") . DIRECTORY_SEPARATOR;
            if (!is_dir($loggerPath)) {
                mkdir($loggerPath, 0777);
            }
            $textLogger = new \Phalcon\Logger\Adapter\File($loggerPath . date('Y-m-d') . '.log');
            $logger->push($textLogger);
            if (APP_DEBUG) {
                $logger->push(new \Phalcon\Logger\Adapter\Firephp(''));
            }
            return $logger;
        });
        /*缓存*/
        $di->setShared('cache', function () {
            $frontCache = new \Phalcon\Cache\Frontend\Data(['lifetime' => '172800']);
            $cacheDir = PROJECT_PATH . 'cache' . DIRECTORY_SEPARATOR;
            $cache = new \Phalcon\Cache\Backend\File($frontCache, ['cacheDir' => $cacheDir]);
            return $cache;
        });
        /*事件管理器*/
        $di->setShared('eventManager', function () {
            $eventManager = new \Phalcon\Events\Manager();
            return $eventManager;
        });
        return $di;
    }

    /**
     * 初始化公共配置信息
     * @return Config
     */
    public function initConfig()
    {
        /**
         * @var $config Config;
         */
        $config = require COMMON_PATH . '/config/config.php';
        if (file_exists(COMMON_PATH . '/config/local.config.php')) {
            $local_configs = require(COMMON_PATH . '/config/local.config.php');
            $config = $config->merge($local_configs);
            unset($local_configs);
        }
        return $config;
    }


}