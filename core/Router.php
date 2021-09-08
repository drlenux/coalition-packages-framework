<?php

namespace core;

class Router
{
    private string $url;
    private string $class;
    private string $action;
    private string $method;

    /**
     * @param string $url
     * @param string $class
     * @param string $action
     * @param string $method
     */
    public function __construct(string $method, string $url, string $class, string $action)
    {
        $this->url = $url;
        $this->class = $class;
        $this->action = $action;
        $this->method = $method;
    }

    public function generate():array
    {
        return [
            $this->method,
            $this->url,
            "{$this->class}#{$this->action}"
        ];
    }
}