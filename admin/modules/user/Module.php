<?php
namespace Admin\Modules\User;

use Phalcon\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Php as PhpEngine;
use Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{
    /**
     * Registers an autoloader related to the module
     *
     * @param DiInterface $di
     */
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = $di->get('loader');
        $loader->registerNamespaces([
            'Admin\Modules\User' => __DIR__ . '/',
        ],true);
    }

    /**
     * Registers services related to the module
     *
     * @param DiInterface $di
     */
    public function registerServices(DiInterface $di)
    {
        /**
         * Setting up the view component
         */
        $di->remove('view');
        $di->set('view', function ()use ($di) {
            $view = new View();
            $view->setDI($di);
            $view->setViewsDir(__DIR__ . '/views/');
            $view->setMainView(PROJECT_PATH.'/views/index');
            $view->registerEngines([
                '.phtml' => PhpEngine::class
            ]);
            return $view;
        });
    }
}
