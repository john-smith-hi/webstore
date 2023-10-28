<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateOrderRequest extends FormRequest
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
            'order_date' => 'required|date',
            'delivery_date' => 'nullable|date|after:order_date',
            'receive_date' => 'nullable|date|after:delivery_date',
            'shipping_address' => 'required',
            'status' => 'required|in:0,1,2,3,4'
        ];
    }

    public function messages(){
        return [
            'required' => ':attribute không được để trống',
            'date' => ':attribute phải là định dạng ngày',
            'delivery_date.after' => ':attribute phải sau ngày đặt hàng',
            'receive_date.after' => ':attribute phải sau ngày giao hàng',
            'status.in' => ':attribute phải có giá trị thuộc 0,1,2,3,4',
        ];
    }

    public function attributes(){
        return [
            'delivery_date' => 'Ngày giao hàng',
            'receive_date' => 'Ngày nhận hàng',
            'shipping_address' => 'Địa chỉ giao hàng',
            'status' => 'Trạng thái'
        ];
    }
}
