<?php

namespace App\Actions;

use App\Dtos\CreateProductDto;
use App\Interfaces\WriteProductRepositoryInterface;
use App\Models\Product;


class CreateProductAction
{

    public function __construct(
        protected WriteProductRepositoryInterface $productRepository,
    )
    {
    }

    public function run(CreateProductDto $dto)
    {
        $product = Product::staticCreate($dto);
        $this->productRepository->save($product);

        return $product;
    }
}
