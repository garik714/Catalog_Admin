<?php

namespace App\Actions;

use App\Dtos\UpdateProductDto;
use App\Interfaces\WriteProductRepositoryInterface;
use App\Models\Product;

class UpdateProductAction

{

    public function __construct(
        protected WriteProductRepositoryInterface $productRepository,
    )
    {
    }

    public function run(Product $product, UpdateProductDto $dto)
    {
        $data = [
            'image' => $dto->image,
            'sku' => $dto->sku,
            'name' => $dto->name,
            'quantity' => $dto->quantity,
            'type' => $dto->type
        ];

        $this->productRepository->update($product, $data);

        return $product;
    }
}
