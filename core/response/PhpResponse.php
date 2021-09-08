<?php

namespace core\response;

class PhpResponse
{
    public function render(string $file, array $data = [], string $charset = 'utf-8'): void
    {
        header('Content-Type:  text/html; charset=' . $charset);
        extract($data);
        require $file;
    }
}