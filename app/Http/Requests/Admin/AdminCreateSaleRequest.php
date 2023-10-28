<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminCreateSaleRequest extends FormRequest
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
            'sale_price' => 'required|numeric',
            'sale_percent' => 'required|numeric|min:0|max:100',
            'start_date' => 'required|date',
            'finish_date' => 'required|date|after:start_date',
            'status' => 'required|in:0,1',
        ];
    }

    public function messages(){
        return [
            'required' => ':attribute không được để trống',
            'numeric' => ':attribute phải là số',
            'min' => ':attribute tối thiểu là 0',
            'max' => ':attribute tối đa là 100',
            'in' => ':attribute phải có giá trị Đóng hoặc Mở',
            'date' => ':attribute phải có định dạng ngày',
            'after' => ':attribute phải lớn hơn Ngày bắt đầu',
        ];
    }

    public function attributes(){
        return [
            'product_id' => 'Sản phẩm',
            'sale_price' => 'Giảm giá',
            'sale_percent' => 'Giảm giá',
            'start_date' => 'Ngày bắt đầu khuyến mãi',
            'finish_date' => 'Ngày kết thúc khuyến mãi',
            'status' => 'Trạng thái',
        ];
    }
}
