<?php

namespace App\Services;
use App\Models\Product;
use Illuminate\Database\QueryException;

class ProductService
{
    public function create(array $product) : bool
    {
        try {
            Product::create($product);
            return true;
        } catch (QueryException $e) {
            // место для лога
            return false;
        }
    }
}
