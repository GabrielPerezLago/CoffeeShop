<?php

namespace src\components;

class Library
{


    public function navbar(array $children)
    {
        $navbar = require_once 'navbar.component.php';

        if ($children == null) $children = [];

        return $navbar($children);
    }

    public function product(string $rol, ?array $args, ?string $route = null): ?string
    {
        if ($rol == null) $route = '/shop';
        $product = require 'product.component.php';
        return $product($rol, $args, $route);
    }
}