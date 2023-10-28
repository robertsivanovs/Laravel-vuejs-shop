<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrdersRequest extends FormRequest
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
            'name' => ['required', 'regex:/^[\p{L}\s]{3,20}$/u'],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]){8,}$/'],
            'product-type' => ['required', 'regex:/^[\p{L}\s]{5,50}$/u'],
            'product-count' => 'required|digits:1',
            'product-size' => 'required|digits:3',
            'product-price' => ['required', 'numeric', 'digits_between:2,3'],
            'with-delivery' => []
        ];
    }

}
