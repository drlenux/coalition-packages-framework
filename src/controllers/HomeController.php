<?php

namespace src\controllers;

use core\response\TwigResponse;
use Spatie\Url\Url;

class HomeController {
    public function index()
    {
        TwigResponse::render('home/index.twig');
    }

    public function test(Url $url, int $id)
    {
        dump($url, $id);
    }
}
