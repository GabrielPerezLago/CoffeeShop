<?php

namespace src\components;

class Library
{


    public function navbar()
    {
        $navbar = require_once 'navbar.php';
        return $navbar(null);
    }
}