<?php
$loader = new \Phalcon\Loader();
$loader->registerNamespaces([
    'Common' => COMMON_PATH,
    'Api' => PROJECT_PATH
]);
return $loader->register();