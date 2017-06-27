<?php

namespace Admin;

use Phalcon\DiInterface;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Mvc\Url;
use Phalcon\Mvc\View;


class Module implements ModuleDefinitionInterface
{

    /**
     * Registers an autoloader related to the module
     * @param DiInterface $di
     */
    public function registerAutoloaders(DiInterface $di = null)
    {
        $di->get('loader')->registerNamespaces([
            'Admin' => __DIR__ . DIRECTORY_SEPARATOR
        ], true);
    }

    /**
     * Registers services related to the module
     * @param DiInterface $di
     */
    public function registerServices(DiInterface $di)
    {
        $di->setShared('view', function () {
            $view = new View();
            $view->setViewsDir(__DIR__ . '/views/');
            $view->registerEngines(
                [
                    '.phtml' => 'Phalcon\Mvc\View\Engine\Php',
                ]
            );
            return $view;
        });
        $di->get('config')->merge(include(__DIR__ . '/config/config.php'));
        /*url服务*/
        $di->remove('url');
        $di->setShared('url', function () use ($di) {
            $url = new Url();
            $url->setBaseUri($di->get('config')->get('application')->baseUri);
            return $url;
        });
    }

}
