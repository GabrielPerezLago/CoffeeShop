<?php


require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../app/DB/MongoConnect.php";

use App\DB\MongoConnect;

try
{
    MongoConnect::client()->command(['ping' => 1]);
    echo 'Conexión a Mongo correcta';
}
catch (\Throwable $e)
{
    http_response_code(500);
    echo 'Error: ' . $e->getMessage();
}