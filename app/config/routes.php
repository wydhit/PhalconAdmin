<?php
/**
 *
 * @var $router Phalcon\Mvc\Router
 */
$router = $di->get("router");
$moduleName = $di->get('request')->getHttpHost();
$module = $application->getModule($moduleName);
/*默认直指 控制器的路由*/
//foreach ($application->getModules() as $key => $module) {
$namespace = str_replace('Module', 'Controllers', $module["className"]);
//$router->setDefaultNamespace($namespace);
//$router->setDefaultController('index');
//$router->setDefaultAction('index');
//$router->add('/:params', array(
//    'namespace' => $namespace,
//    'module' => $moduleName,
//    'controller' => 'index',
//    'action' => 'index',
//    'params' => 1
//));
//$router->add('/:controller', array(
//    'namespace' => $namespace,
//    'module' => $moduleName,
//    'controller' => 1,
//    'action' => 'index',
//    'params' => 2
//));
$router->add('/:controller/:action/:params', array(
    'namespace' => $namespace,
    'module' => $moduleName,
    'controller' => 1,
    'action' => 2,
    'params' => 3
));
//$router->notFound([
//    'namespace' => 'Common\Controllers',
//    'controller' => 'Base',
//    'action' => 'noFound',
//    'params' => ''
//]);
//}