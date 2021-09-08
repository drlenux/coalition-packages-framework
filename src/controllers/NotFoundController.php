<?php

namespace src\controllers;

use core\TwigRender;
use Spatie\Url\Url;

class NotFoundController
{
    public function index(Url $url)
    {
        header("HTTP/1.1 404 Not Found");
        echo TwigRender::create()->render('error/404.twig');
    }
}