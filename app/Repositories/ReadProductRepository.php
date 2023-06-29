<?php

namespace App\Repositories;

use App\Interfaces\ReadProductRepositoryInterface;
use App\Models\Product;

class ReadProductRepository implements ReadProductRepositoryInterface
{
    public function query(): \Illuminate\Database\Eloquent\Builder
    {
        return Product::query();
    }

    public function select($selectedColumns)
    {
        return $this->query()->select($selectedColumns)->paginate(10);
    }

    public function getAll()
    {
        return $this->query()->paginate(10);
    }
}
