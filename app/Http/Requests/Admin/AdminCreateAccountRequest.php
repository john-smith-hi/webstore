<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminCreateAccountRequest extends FormRequest
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
            'tel' => 'required|numeric|unique:users,tel',
            'email' => 'required|email:dns,rfc|unique:users,email',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required|in:0,1',
            'role' => 'required|numeric',
        ];
    }

    public function messages(){
        return [
            'required' => ':attribute không được để trống',
            'numeric' => ':attribute phải là số',
            'unique' => ':attribute đã tồn tại',
            'email' => ':attribute không đúng định dạng',
            'in' => ':attribute phải có giá trị là Nam hoặc Nữ',
        ]; 
    }

    public function attributes(){
        return [
            'tel' => 'Số điện thoại',
            'email' => 'Email',
            'first_name' => 'Họ',
            'last_name' => 'Tên',
            'gender' => 'Giới tính',
            'role' => 'Vai trò',
        ];
    }
}
