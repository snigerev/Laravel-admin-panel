<?php
/**
 * Copyright (c) 27.11.2019.
 * File - UserCreateRequest.php
 * Author - tor
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
        $role_id = [0, 1, 2];

        return [
            'name' => ['required', 'string', 'max:255'],
            'nickname' => ['string', 'max:50'],
            'role_id' => ['required', 'in_array:role_id'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
}
