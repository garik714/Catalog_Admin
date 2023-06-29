<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteProductRequest extends FormRequest
{
    const IDS = 'ids';

    //    public function authorize(): bool
//    {
//
//        return Auth::check();
//    }quantity

    public function rules(): array

    {
        return [
            self::IDS => [
                'required'
            ],
        ];

    }

    public function getIds()
    {
        return $this->get(self::IDS);
    }
}
