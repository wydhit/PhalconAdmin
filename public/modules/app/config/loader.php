<?php

use Phalcon\Loader;

$loader = new Loader();

/**
 * Register Namespaces
 */
$loader->registerNamespaces([
    'Modules\Models' => APP_PATH . '/common/models/',
    'Modules'        => APP_PATH . '/common/library/',
]);

/**
 * Register module classes
 */
$loader->registerClasses([
    'Modules\Modules\Frontend\Module' => APP_PATH . '/modules/frontend/Module.php',
    'Modules\Modules\Cli\Module'      => APP_PATH . '/modules/cli/Module.php'
]);

$loader->register();
