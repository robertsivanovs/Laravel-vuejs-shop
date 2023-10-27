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
            'name' => 'required|regex:/[a-zA-Z0-9Ā-Žā-ž\s]{3,}/|max:20',
            'phone' => 'required|regex:/[0-9+-]{8,}/|max:20',
            'product-type' => 'required|regex:/[a-zA-ZĀ-Žā-ž\s]{5,}/|max:50',
            'product-count' => 'required|digits:1',
            'product-size' => 'required|digits:3',
            'product-price' => 'required|numeric|digits_between:2,3',
        ];
    }
}
