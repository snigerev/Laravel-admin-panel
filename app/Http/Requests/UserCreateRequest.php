<?php
/**
 * Copyright (c) 20.12.2019.
 * File - UserCreateRequest.php
 * Author - snigerev
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
        $role_id = [1, 2, 3];

        return [
            'name' => ['string', 'max:255'],
            'nickname' => ['string', 'max:50'],
            'role_id' => ['in_array:role_id'],
            'email' => ['string', 'email', 'max:255', 'unique:users'],
            'password' => ['string', 'min:8', 'confirmed'],
        ];
    }
}
