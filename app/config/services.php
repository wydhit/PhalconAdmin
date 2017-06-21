<?php
use \Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;
use Phalcon\Session\Adapter\Files as SessionAdapter;

$di = new FactoryDefault();
/**
 * @var $config \Phalcon\Config
 */
$di->setShared('config',$config);
/*数据库服务*/
$di->setShared('db', function () use ($config) {
    $dbConfig = $config->get('database')->toArray();
    $adapter = $dbConfig['adapter'];
    unset($dbConfig['adapter']);
    $class = 'Phalcon\Db\Adapter\Pdo\\' . $adapter;
    return new $class($dbConfig);
});

/*路由服务*/
$di->setShared('router', function () {
    $router = new \Phalcon\Mvc\Router();
    $router->setDefaultModule('www');
    $router->setDefaultNamespace('Www\Controllers');
    $router->setDefaultController('index');
    $router->setDefaultAction('list');
    return $router;
});
/*自动加载器*/
$di->setShared('loader', function () use ($di) {
    $loader = new \Phalcon\Loader();
    $loader->setEventsManager($di->get('eventsManager'));
    $loader->registerNamespaces([
        'Common' => APP_PATH  . 'common' . D_S
    ]);
    return $loader;
});
/*事件管理器*/
$di->setShared('eventManager', function () {
    $eventManager = new Phalcon\Events\Manager();
    return $eventManager;
});
/*url服务*/
$di->setShared('url', function ()use ($config)  {
    $url = new UrlResolver();
    $url->setBaseUri( $config->get('application')->baseUri);
    return $url;
});
/*模型元数据*/
$di->setShared('modelsMetadata', function () {
    return new MetaDataAdapter();
});
/*session*/
$di->setShared('session', function () {
    $session = new SessionAdapter();
    $session->start();
    return $session;
});
