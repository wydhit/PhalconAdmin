<?php


return new Phalcon\Config([
    'application' => [
        'domain'=>'http://api.p.a.com',
        'baseUri' => '/',
        'projectDir'         => PROJECT_PATH,
        'modelsDir'      => PROJECT_PATH . 'common/models'.DIRECTORY_SEPARATOR,
        'migrationsDir'  => PROJECT_PATH . 'migrations'.DIRECTORY_SEPARATOR,
        'cacheDir'       => PROJECT_PATH . 'cache'.DIRECTORY_SEPARATOR,

    ]
]);

