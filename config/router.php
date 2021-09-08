<?php

use core\Router;

return [
    new Router('GET', '/', \src\controllers\HomeController::class, 'index'),
    new Router('GET', '/test/[i:id]', \src\controllers\HomeController::class, 'test'),
];