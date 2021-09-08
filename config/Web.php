<?php

namespace config;

use src\controllers\NotFoundController;

class Web
{
    public const ROUTER_FILE = __DIR__ . '/router.php';
    public const NOT_FOUND_ACTION = NotFoundController::class . '#index';

    public const TWIG_TMP_DIR = __DIR__ . '/../runtime/twig/';
    public const TWIG_VIEW_BASE_DIR = __DIR__ . '/../src/views';
    public const TWIG_DEBUG_MODE = false;
}
