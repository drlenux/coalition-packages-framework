<?php

namespace core\response;

use core\TwigRender;

class TwigResponse
{
    public static function render(string $file, array $args = []): void
    {
        header('Content-Type:  text/html; charset=utf-8');
        echo TwigRender::create()->render($file, $args);
    }
}