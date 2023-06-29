<?php

namespace App\Dtos;

use App\Http\Requests\CreateProductRequest;
use Illuminate\Support\Facades\Auth;
use Spatie\LaravelData\Data;

class CreateProductDto extends Data
{
    public function __construct(
        public string $name,
        public string $image,
        public int    $quantity,
        public string $type,
        public string $sku,
    )
    {
    }

    public static function fromRequest(CreateProductRequest $request): static
    {
        return new self(
            $request->getName(),
            $request->getImage(),
            $request->getQuantity(),
            $request->getType(),
            $request->getSku()
        );
    }
}
