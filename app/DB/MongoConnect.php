<?php

namespace App\DB;

use http\Exception\RuntimeException;
use MongoDB\Client;
use MongoDB\Database;

class MongoConnect
{
    private static ?Client $client = null;

    public static function client(): Database
    {
        static $uri = getenv('MONGO_URI');
        static $db_name = getenv('MONGO_DB_NAME');

        if ($uri === false || $db_name === false)
            throw new RuntimeException('Las varialbes de entorno no son validas');

        if (self::$client === null)
            self::$client = new Client($uri);

        return self::$client->selectDatabase($db_name);
    }
}