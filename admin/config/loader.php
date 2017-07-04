<?php

if (file_exists(ROOT_PATH . 'vendor/autoload.php')) {
   include(ROOT_PATH . 'vendor/autoload.php');
}
$loader = new \Phalcon\Loader();
$loader->registerNamespaces([
    'Common' => COMMON_PATH,
    'Admin' => PROJECT_PATH
]);
return $loader->register();