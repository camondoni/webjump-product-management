<?php

namespace Camondoni\Framework;

class Response
{
    public static function json($jsonObj, $httpCode = 200)
    {
        header('Content-Type: application/json; charset=utf-8');
        http_response_code($httpCode);
        return json_encode($jsonObj, JSON_PRETTY_PRINT);
    }

    public static function notFound(): void
    {
        http_response_code(404);
        die();
    }

    public static function methodNotAllowed(): void
    {
        http_response_code(405);
        die();
    }

    public static function serverError(): void
    {
        http_response_code(500);
    }
}
