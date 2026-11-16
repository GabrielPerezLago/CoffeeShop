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

    public static function product(?array $args): ?string
    {
        $product = require_once 'product.component.php';
        return $product($args);
    }
}