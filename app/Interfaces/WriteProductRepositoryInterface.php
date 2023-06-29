<?php

namespace App\Interfaces;

use App\Models\Product;

interface WriteProductRepositoryInterface
{
    public function save(Product $product): Product;
    public function update(Product $product, array $data): Product;
    public function delete(array $ids);
}
