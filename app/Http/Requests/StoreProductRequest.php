<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'description' => 'required|string',
            'category_id' => 'integer',
            'size' => 'in:XS,S,M,L,XL',
            'published_state' => 'required|boolean',
            'discount' => 'required|boolean',
            'price' => 'required|numeric',
            'reference' => 'string|size:16',
            'picture' => 'image',
        ];
    }
}
