<?php

namespace core;

use config\Web;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TwigRender
{
    public static function create(): Environment
    {
        return once(function () {
            $loader = new FilesystemLoader(Web::TWIG_VIEW_BASE_DIR);
            return new Environment($loader, [
                'cache' => Web::TWIG_TMP_DIR,
                'debug' => Web::TWIG_DEBUG_MODE,
            ]);

        });
    }
}