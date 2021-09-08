<?php

namespace src\controllers;

use core\response\RedirectResponse;
use core\response\TwigResponse;
use core\WebApp;
use Spatie\Url\Url;

class HomeController {
    public function index()
    {
        TwigResponse::render('home/index.twig');
    }

    public function test(Url $url, int $time)
    {
        $uri = WebApp::$urlSigner->sign($url->getScheme() . '://' . $url->getHost() . ':' . $url->getPort() . '/validate/' . $time, $time);
        echo "<a href=\"{$uri}\">$uri</a>";
    }

    public function validate(Url $url, int $time)
    {
        if (!WebApp::$urlSigner->validate($url)) return (new RedirectResponse())->redirect('/');
        echo 'valid ' . $time . ';' . time();
    }
}
