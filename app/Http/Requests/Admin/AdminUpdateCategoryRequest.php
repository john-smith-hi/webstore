<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class AdminUpdateCategoryRequest extends FormRequest
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
            'name' => 'required|unique:categories,name,'.$id,
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
