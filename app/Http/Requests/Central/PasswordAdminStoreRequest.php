<?php

namespace App\Http\Requests\Central;

use App\Rules\CurrentAdminPassword;
use Illuminate\Foundation\Http\FormRequest;

class PasswordAdminStoreRequest extends FormRequest
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
            'password_current' => ['required', new CurrentAdminPassword()],
            'password' => 'required|string|min:6|confirmed',
        ];
    }
}
