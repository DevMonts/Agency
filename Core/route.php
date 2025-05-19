<?php
class Route
{
    public static function get($uri, $callback)
    {
        self::handle('GET', $uri, $callback);
    }

    public static function post($uri, $callback)
    {
        self::handle('POST', $uri, $callback);
    }
    private static function handle($method, $uri, $callback)
    {
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        if ($_SERVER['REQUEST_METHOD'] === $method && $requestUri === $uri) {
            if (is_callable($callback)) {
                call_user_func($callback);
            } elseif (is_array($callback)) {
                [$controller, $method] = $callback;
                (new $controller)->$method();
            }
            exit;
        }
    }
}
