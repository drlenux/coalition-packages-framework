<?php

namespace core;

use Spatie\Url\Url;
use Spatie\UrlSigner\MD5UrlSigner;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\ErrorHandler\Debug;
use config\Web;

class WebApp
{
    private static Url $url;
    public static MD5UrlSigner $urlSigner;
    private static Dotenv $dotenv;

    /** @var Router[] */
    private static array $router;

    public static function create(Dotenv $dotenv): void
    {
        self::$dotenv = $dotenv;
        Debug::enable();

        self::init();
        self::start();
    }

    private static function init(): void
    {
        self::$url = Url::fromString(self::urlOrigin());
        self::$urlSigner = new MD5UrlSigner($_ENV['URL_KEY'], 'exp', 'sig');
        self::$router = require Web::ROUTER_FILE;
    }

    private static function start(): void
    {
        $routers = new \AltoRouter();
        foreach (self::$router as $router) {
            $routers->map(...$router->generate());
        }
        $data = $routers->match(self::$url->getPath());
        if ($data === false) {
            $data = [
                'target' => Web::NOT_FOUND_ACTION,
                'params' => [],
            ];
        }
        $target = explode('#', $data['target']);
        $class = new $target[0];
        $class->{$target[1]}(self::$url, ...$data['params']);
    }

    private static function urlOrigin(): string
    {
        $ssl = 'http';
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
            $ssl .= 's';
        }
        $ssl .= '://';

        return $ssl . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    }


}