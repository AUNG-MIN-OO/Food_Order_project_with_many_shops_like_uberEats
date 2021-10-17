<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterShop extends FormRequest
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
            "name" => "required|string|max:256",
            "email" => "required|string|min:3|max:256",
            "password" => "required|string|min:7|max:16",
            "password_confirmation" => "required|string|min:7|max:16",
            "phone" => "required|string|min:7|max:16",
            "address" => "required|min:7",
            "profile_image" => "required|image|mimes:jpg,jpeg,png"
        ];
    }
}
