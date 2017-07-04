<?php

use Phalcon\Loader;

$loader = new Loader();

/**
 * Register Namespaces
 */
$loader->registerNamespaces([
    'Bb\Models' => APP_PATH . '/common/models/',
    'Bb'        => APP_PATH . '/common/library/',
]);

/**
 * Register module classes
 */
$loader->registerClasses([
    'Bb\Modules\Frontend\Module' => APP_PATH . '/modules/frontend/Module.php',
    'Bb\Modules\Cli\Module'      => APP_PATH . '/modules/cli/Module.php'
]);

$loader->register();
