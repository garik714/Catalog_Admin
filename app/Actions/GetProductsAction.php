<?php

namespace App\Actions;

use App\Interfaces\ReadProductRepositoryInterface;


class GetProductsAction
{
    public function __construct(
        protected ReadProductRepositoryInterface $productRepository,
    )
    {
    }

    public function run()
    {
        $selectedColumns = config('admin.select_columns');
        $products = $this->productRepository->select($selectedColumns);

        return $products;
    }

}
