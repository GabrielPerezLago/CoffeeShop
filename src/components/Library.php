<?php

namespace src\components;

class Library
{


    public function navbar(array $children)
    {
        $navbar = require_once 'navbar.php';

        if ($children == null) $children = [];

        return $navbar($children);
    }
}