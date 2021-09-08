<?php

namespace core\response;

class JsonResponse
{
    public static function render(array $data): void
    {
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}