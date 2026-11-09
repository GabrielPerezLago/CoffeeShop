<?php
namespace app;
class ConfigProvider
{
    private $config;

    public function __construct()
    {
        $this->config = require 'conf.php';
    }

    /**
     * Metodo que retona la uri de mongo
     * @return string
     */
    public function uri(): string
    {
        return $this->config['uri'];
    }
}