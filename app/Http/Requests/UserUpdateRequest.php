<?php

namespace App\Http\Requests;

use App\Rules\OldPassword;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name'                      => 'nullable|unique:users|max:255|min:' . config('validation.username.min_length'),
            'email'                     => 'nullable|unique:users|email',
            'password'                  => 'nullable|string|confirmed|min:' . config('validation.password.min_length'),
            'old_password'              => ['required', 'string', new OldPassword],
        ];
    }
}
