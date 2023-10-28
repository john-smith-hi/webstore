<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateAboutusRequest extends FormRequest
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
            'text' => 'required',
        ];
    }

    public function messages(){
        return [
            'required' => ':attribute không được để trống',
        ];
    }

    public function attributes(){
        return [
            'text' => 'Trang giới thiệu',
        ];
    }
}
