<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addBlog extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'image' => 'required|image|mimes:jepg,png,jpg,gif|max:2048',
            'description' => 'required',
            'content'  => 'required',
        ];
    }
    public function messages(){
        return [
            'required' => ':attribute không được để trống!!!',
        ];
    }
    public function attributes(){
        return [
            'title' => 'Tiêu đề',
            'image' => 'Ảnh',
            'description' =>'Miêu tả',
            'content' => 'Nội dung',
        ];
    }
}
