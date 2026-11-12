<?php

namespace src\pages;

class Router
{

    private array $routes;

    public function __construct()
    {
        $this->routes = [
            '/' => __DIR__ . '/home.php',
            '/login' => __DIR__ . '/login.php',
            '/cart'
        ];
    }

    public function go(string $route)
    {

        $direction = trim($this->routes[$route]);

        $r = $this->doFilter($direction);

        if ($r !== null)
            $direction = $r;

        if ($direction && file_exists($direction))
        {
            ob_start();
            include $direction;
            return ob_get_clean();
        }
        return '<h1>404 Not Found</h1>';
    }

    private function doFilter(string $route): string|null
    {
        $login = $this->loginFilter($route);
        if ($login !== null) return $login;

        return null;
    }

    private function loginFilter(string $route): string|null
    {
        if ($route !== '/login' && $route !== '/cart')
            return null;

        $session = $_SESSION['email'] ?? false;
        if (!$session)
            return '/login';
        else
            return '/cart';

    }
}