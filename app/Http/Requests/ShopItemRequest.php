<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopItemRequest extends FormRequest
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
            "name" => "required|string|min:3|max:256",
            "price" => "required|integer|min:3",
            "item_count" => "required|integer|min:1|max:100",
            "item_image" => "required|mimes:jpg,jpeg,png"
        ];
    }
}
