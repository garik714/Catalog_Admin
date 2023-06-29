<?php

namespace App\Models;

use App\Dtos\CreateProductDto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'image',
        'sku',
        'name',
        'quantity',
        'type',
    ];


    public static function staticCreate(CreateProductDto $dto): self
    {
        $product = new self();

        $product->setImage($dto->image);
        $product->setSku($dto->sku);
        $product->setName($dto->name);
        $product->setQuantity($dto->quantity);
        $product->setType($dto->type);

        return $product;
    }

    public function setImage(string $shortUrl): void
    {
        $this->image = $shortUrl;
    }

    public function setSku(string $sku): void
    {
        $this->sku = $sku;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }
}
