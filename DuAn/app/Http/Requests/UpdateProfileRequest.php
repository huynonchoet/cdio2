<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'email' => 'required|email',
            'avatar' => 'image|mimes:jepg,png,jpg,gif|max:2048'
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'email' => ':attribute sai định dạng',
            'image' => ':attribute không phải là ảnh',
            'max' => ':attribute phải bé hơn 1mb',
        ];
    }
    public function attributes(){
        return[
            'name' => 'Tên',
            'email'=> 'Email',
            'avatar' => 'avatar',
        ];
    }
}
