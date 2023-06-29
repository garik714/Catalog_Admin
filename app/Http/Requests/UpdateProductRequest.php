<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    const IMAGE = 'image';
    const NAME = 'name';
    const QUANTITY = 'quantity';
    const SKU = 'sku';
    const TYPE = 'type';

//    public function authorize(): bool
//    {
//
//        return Auth::check();
//    }quantity

    public function rules(): array

    {
        return [

            self::IMAGE => [
                'required'
            ],
            self::NAME => [
                'required'
            ],
            self::QUANTITY => [
                'int',
                'required'
            ],
            self::SKU => [
                'required'
            ],
            self::TYPE => [
                'required'
            ],

        ];

    }

    public function getImage()
    {
        return $this->get(self::IMAGE);
    }

    public function getName()
    {
        return $this->get(self::NAME);
    }

    public function getSku()
    {
        return $this->get(self::SKU);
    }

    public function getQuantity()
    {
        return $this->get(self::QUANTITY);
    }

    public function getType()
    {
        return $this->get(self::TYPE);
    }
}
