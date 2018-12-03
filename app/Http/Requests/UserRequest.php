<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
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
            'name' => 'required|between:2,25',
            'email' => 'required|email',
            'introduction' => 'max:80',
            'avatar'=> 'nullable|max:1024|image|mimes:gif,jpg,png'
        ];
    }

    public function messages()
    {
        return [
            'name.between' => '用户名必须介于 3 - 25 个字符之间。',
            'name.required' => '用户名不能为空。',
            'avatar.max'    => '头像不能超过1M',
            'avatar.mimes'  => '头像格式不支持'
        ];
    }

}
