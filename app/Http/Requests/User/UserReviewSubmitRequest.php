<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserReviewSubmitRequest extends FormRequest
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
            'comment' => 'required',
            'rating' => 'required|in:0,1,2,3,4,5',
        ];
    }

    public function messages(){
        return [
            'required'=> ':attribute không được để trống',
            'rating.in' => 'Đánh giá không đúng',
        ];
    }

    public function attributes(){
        return [
            'product_id' => '',
            'comment'=> 'Bình luận',
            'rating' => 'Đánh giá',
        ];
    }
}
