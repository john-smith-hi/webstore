<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class AdminUpdateBrandRequest extends FormRequest
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
        $id = Request::input('id');
        return [
            'name' => 'required|unique:brands,name,'.$id,
            'email' => 'nullable|email:dns,rfc|unique:brands,email,'.$id,
            'tel' => 'nullable|numeric|unique:brands,tel,'.$id,
            'image' => 'nullable|image|max:4096',
        ];
    }

    public function messages(){
        return [
            'required' => ':attribute không được để trống',
            'numeric' => ':attribute không phải là số',
            'unique' => ':attribute đã tồn tại',
            'email' => ':attribute không đúng định dạng email',
            'image' => ':attribute không đúng định dạng hình ảnh',
            'iamge.max' => ':attribute không được lớn hơn 4MB',
        ];
    }

    public function attributes(){
        return [
            'name' => 'Tên',
            'email' => 'Email',
            'tel' => 'Số điện thoại',
            'image' => 'Ảnh đại diện',
        ];
    }
}
