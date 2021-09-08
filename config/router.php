<?php

use core\Router;

return [
    new Router('GET', '/', \src\controllers\HomeController::class, 'index'),
    new Router('GET', '/test/[i:time]', \src\controllers\HomeController::class, 'test'),
    new Router('GET', '/validate/[i:time]', \src\controllers\HomeController::class, 'validate'),
];