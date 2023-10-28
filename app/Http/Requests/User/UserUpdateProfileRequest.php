<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateProfileRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'tel' => 'nullable|numeric',
            'gender' => 'required|in:0,1',
            'email'=> 'required|email:dns,rfc',
        ];
    }

    public function messages(){
        return [
            'required' => ':attribute không được để trống',
            'numeric' => ':attribute không đúng định dạng số',
            'email' => ':attribute không đúng định dạng email',
            'gender.in' => 'Giới tính phải có giá trị là Nam hoặc Nữ',
        ];
    }

    public function attributes(){
        return [
            'first_name' => 'Họ',
            'last_name' => 'Tên',
            'tel' => 'Số điện thoại',
            'email'=> 'Email',
            'gender' => 'Giới tính',
        ];
    }
}
