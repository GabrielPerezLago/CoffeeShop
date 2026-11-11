<?php

namespace src\pages;

class Router
{

    private array $routes;

    public function __construct()
    {
        $this->routes = [
            '/' => __DIR__ . '/home.php',
            '/login',
        ];
    }

    public function go(string $route)
    {
        $direction = trim($this->routes[$route]);

        if ($direction && file_exists($direction))
        {
            ob_start();
            include $direction;
            return ob_get_clean();
        }
        return '<h1>404 Not Found</h1>';
    }
}