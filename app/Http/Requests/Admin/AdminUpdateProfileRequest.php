<?php

namespace App\Http\Requests\Admin;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateProfileRequest extends FormRequest
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
            'tel' => 'required|numeric|unique:users,tel,'.Auth::user()->id,
            'email' => 'required|email:rfc,dns|unique:users,email,'.Auth::user()->id,
            'first_name' =>  'required',
            'last_name' => 'required',
            'avatar' => 'nullable|max:2048|image',
            'gender' => 'required|in:0,1',
        ];
    }

    public function messages(){
        return [
            'required' => ':attribute không được để trống',
            'numeric' => ':attribute không phải là số',
            'unique' => ':atribute đã tồn tại',
            'email' => ':attribute không đúng định dạng email',
            'gender.in' => ':attribute phải thuộc giá trị Nam hoặc Nữ',
            'avatar.max' => ':attribute có kích thước tối đa 2MB',
            'image' => ':attribute không đúng định dạng hình ảnh',
        ];
    }

    public function attributes(){
        return [
            'tel' => 'Số điện thoại',
            'email' => 'Email',
            'first_name' => 'Họ',
            'last_name' => 'Tên',
            'avatar' => 'Ảnh đại diện',
            'gender' => 'Giới tính',
        ];
    }

}
