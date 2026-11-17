<?php

namespace App\Controllers;

use App\Models\Product;

class ProductController
{
    private static ?Product $product;

    public function __construct()
    {
        self::$product = new Product();
    }

    public function all(): ?array
    {
        return self::$product->getAll();
    }

}