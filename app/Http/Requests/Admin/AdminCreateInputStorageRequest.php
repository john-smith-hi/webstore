<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminCreateInputStorageRequest extends FormRequest
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
            'product_id' => 'required',
            'origin_price' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:0',
        ];
    }

    public function messages(){
        return [
            'required' => ':attribute không được để trống',
            'numeric' => ':attribute phải là số',
            'min' => ':attribute phải có giá trị nhỏ nhất là :min',
        ];
    }

    public function attributes(){
        return [
            'product_id' => 'Sản phẩm',
            'origin_price' => 'Giá sản phẩm',
            'quantity' => 'Số lượng',
            'price' => 'Giá',
        ];
    }
}
