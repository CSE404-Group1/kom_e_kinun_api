<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            'description' => '',
            'phone_num' => 'required|alpha_dash|min:7',
            'facebook_page' => 'url|unique:users',
            'location' => '',
            'website' => 'url|unique:users',
            'is_superadmin' => 'required|boolean',
            'is_seller' => 'required|boolean',
            'is_premium' => 'required|boolean'

        ];
    }
}
