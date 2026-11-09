<?php

namespace mongo;

use app\ConfigProvider;

require_once '../app/ConfigProvider.php';

class MongoConnection
{
    public static function conection()
    {
        $connect = new ConfigProvider();
        return new \MongoDB\Client($connect->uri());
    }
}