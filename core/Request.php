<?php

namespace Core;

/**
 * Class Request
 *
 * @namespace Core
 */
class Request
{
    /**
     * uri
     *
     * @return string
     */
    public static function uri()
    {
        return trim(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'
        );
    }

    /**
     * method
     *
     * @return mixed
     */
    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}
