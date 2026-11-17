<?php

namespace App\Models;

use App\DB\MongoConnect;
use MongoDB\Collection;

class Product
{
    private static array $typeMap = [
        'typeMap' => [
            'root' => 'array',
            'document' => 'array',
            'array' => 'array',
        ]
    ];
    private static string $collection = 'products';
    private static ?Collection $productCollection;

    public function __construct()
    {
        self::$productCollection = MongoConnect::client()->selectCollection(self::$collection);
    }

    public function getAll(): array
    {
        return self::$productCollection
            ->find([], self::$typeMap)
            ->toArray();
    }






}