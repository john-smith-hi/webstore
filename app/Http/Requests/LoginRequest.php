<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|email:dns,rfc',
        ];
    }

    public function messages(){
        return [
            'required' => ':attribute không được để trống',
            'email' => ':attribute không đúng định dạng',
        ];
    }

    public function attributes(){
        return [
            'email' => 'Email',
        ];
    }
}
