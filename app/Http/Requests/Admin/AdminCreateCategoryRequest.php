<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminCreateCategoryRequest extends FormRequest
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
            'name' => 'required|unique:categories',
            'parent_id' => 'required|numeric',
        ];
    }

    public function messages(){
        return [
            'required' => ':attribute không được để trống',
            'unique' => ':attribute đã tồn tại',
            'numeric' => ':attribute phải là số',
        ];
    }

    public function attributes(){
        return [
            'name' => 'Tên',
            'parent_id' =>' Danh mục cha',
        ];
    }
}
