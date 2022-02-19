<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'name' => 'required',
            'price' => 'required|numeric',
            'files' => 'required',
            'files.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'profile' => 'required',
            'detail' => 'required'
        ];
    }
    public function messages(){
        return [
            'required' => ':attribute không được để trống',
            'numeric'  => ':attribute phải là số',
            'image' => ':attribute phải là ảnh'
        ];
    }
    public function attributes(){
        return [
            'name' => 'Tên sản phẩm',
            'price' => 'Giá sản phẩm',
            'profile' => 'Tên công ty',
            'detail' => 'Chi tiết',
            'files' => 'Ảnh'
        ];
    }
}
