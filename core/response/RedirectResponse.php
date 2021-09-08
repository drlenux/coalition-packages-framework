<?php

namespace core\response;

class RedirectResponse
{
    public function redirect(string $url)
    {
        header("Location: {$url}");
        return null;
    }
}