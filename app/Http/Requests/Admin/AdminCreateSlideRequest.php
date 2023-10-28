<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminCreateSlideRequest extends FormRequest
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
            'link' => 'required|url:http,https',
            'slide' => 'required|image|max:4096',
        ];
    }

    public function messages(){
        return [
            'required' => ':attribute không được để trống',
            'url' => ':attribute không đúng định dạng http://example.com',
            'image' => ':attribute không đúng định dạng hình ảnh',
            'slide.max' => ':attribute không được lớn hơn 4MB',
        ];
    }

    public function attributes(){
        return [
            'link' => 'Link',
            'slide' => 'Slide',
        ];
    }
}
