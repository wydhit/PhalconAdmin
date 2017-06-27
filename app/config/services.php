<?php
use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Common\Core\Cookies;
use Phalcon\Crypt;

$di = new FactoryDefault();
/**
 * @var $config \Phalcon\Config
 */
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
$di->setShared('router', function () use ($di){
    $router = new \Phalcon\Mvc\Router();
    return $router;
});
/*自动加载器*/
$di->setShared('loader', function () use ($di) {
    $loader = new \Phalcon\Loader();
    $loader->setEventsManager($di->get('eventsManager'));
    $loader->registerNamespaces([
        'Common' => APP_PATH . 'common' . D_S
    ]);
    return $loader;
});
/*事件管理器*/
$di->setShared('eventManager', function () {
    $eventManager = new Phalcon\Events\Manager();
    return $eventManager;
});
/*url服务*/
$di->setShared('url', function () use ($config) {
    $url = new UrlResolver();
    $url->setBaseUri($config->get('application')->baseUri);
    return $url;
});
/*模型元数据*/
$di->setShared('modelsMetadata', function () {
    return new MetaDataAdapter();
});
/*session*/
$di->setShared('session', function () {
    $session = new SessionAdapter();
    $session->setName('mcSessionId');
    $session->start();
    return $session;
});
/*cookie*/
$di->setShared(
    'cookies',
    function () {
        $cookies = new Cookies();
        $cookies->setExpire(time()+24*60*60);
        $cookies->useEncryption(true);
        return $cookies;
    }
);
/*加密解密*/
$di->setShared(
    'crypt',
    function () {
        $crypt = new Crypt();
        $crypt->setKey(
            '%3171e$i86e$f!8ja1'
        );
        return $crypt;
    }
);
/*日志*/
$di->setShared('logger',function (){
    $logger= new \Phalcon\Logger\Multiple();
    $loggerPath=BASE_PATH.'logs'.D_S.date("Y").D_S;
    if(!is_dir($loggerPath)){
        mkdir($loggerPath,0777);
    }
    $textLogger =new \Phalcon\Logger\Adapter\File($loggerPath.date('Y-m-d').'.log');
    $logger->push($textLogger);
    if(APP_DEBUG){
        $logger->push(new \Phalcon\Logger\Adapter\Firephp(''));
    }
    return $logger;
});
/*缓存*/
$di->setShared('cache',function (){
    $frontCache= new \Phalcon\Cache\Frontend\Data(['lifetime'=>'172800']);
    $cacheDir=BASE_PATH.'cache'.D_S;
    $cache= new \Phalcon\Cache\Backend\File($frontCache,['cacheDir'=>$cacheDir]);
    return $cache;
});

