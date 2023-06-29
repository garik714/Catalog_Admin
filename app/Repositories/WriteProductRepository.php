<?php

namespace App\Repositories;

use App\Interfaces\WriteProductRepositoryInterface;
use App\Models\Product;

class WriteProductRepository implements WriteProductRepositoryInterface
{
    public function query(): \Illuminate\Database\Eloquent\Builder
    {
        return Product::query();
    }

    public function save(Product $product): Product
    {
        if (!$product->save()) {
            throw new \Exception('Saving error');
        }
        return $product;
    }

    public function update(Product $product, array $data): Product
    {
        if (!$product->update($data)) {
            throw new \Exception('Saving error');
        }

        return $product;
    }
    public function delete(array $ids)
    {
        if (!$this->query()
            ->whereIn('id', $ids)->delete()) {
            throw new \Exception('Saving error');
        }

        return true;
    }

}
