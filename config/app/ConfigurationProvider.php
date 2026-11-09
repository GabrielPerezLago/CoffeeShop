<?php

use PSpell\Config;

class ConfigurationProvider
{
    private $config;

    public function __construct()
    {
        $this->config = require_once 'config.php';
    }


    public static function getInstance()
    {
        return $this->config['uri'];
    }
}