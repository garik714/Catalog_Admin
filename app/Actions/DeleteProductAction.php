<?php

namespace App\Actions;

use App\Http\Requests\DeleteProductRequest;
use App\Interfaces\WriteProductRepositoryInterface;

class DeleteProductAction
{

    public function __construct(
        protected WriteProductRepositoryInterface $productRepository,
    )
    {
    }

    public function run(DeleteProductRequest $productRequest): void
    {
        $this->productRepository->delete($productRequest->getIds());
    }
}
