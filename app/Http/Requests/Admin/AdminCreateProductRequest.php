<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminCreateProductRequest extends FormRequest
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
            'name' => 'required|unique:products',
            'price' => 'required|numeric',
            'category_id' => 'required|numeric',
            'brand_id' => 'required|numeric',
            'status_storage' => 'required|numeric|in:0,1',
            'status_sell' => 'required|numeric|in:0,1',
        ];
    }

    public function messages(){
        return [
            'required' => ':attribute không được để trống',
            'numeric' => ':attribute phải là số',
            'unique' => ':attribute đã tồn tại',
            'in' => ':attribute phải có giá trị Đóng hoặc Mở',
        ];
    }

    public function attributes(){
        return [
            'name' => 'Tên',
            'price' => 'Giá',
            'category_id' => 'Danh mục',
            'brand_id' => 'Thương hiệu',
            'status_storage' => 'Trạng thái kho',
            'status_sell' => 'Trạng thái bán hàng',
        ];
    }
}
