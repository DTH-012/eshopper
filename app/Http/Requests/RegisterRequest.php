<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class RegisterRequest extends FormRequest
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
            'txtname' => 'required',
            'txtEmail' => 'required|unique:users,email',
            'txtPassword' => 'required',
            'txtRePassword' => 'required|same:txtPassword',
        ];
    }
    public function messages()
    {
        return [
            'txtname.required' => 'Vui lòng nhập họ tên',
            'txtEmail.required' => 'Vui lòng nhập Email',
            'txtEmail.unique' => 'Email đã tồn tại',
            'txtPassword.required' => 'Vui lòng nhập mật khẩu',
            'txtRePassword.required' => 'Vui lòng nhập xác nhận ',
            'txtRePassword.same' => 'Mật khẩu không khớp',
        ];
    }
    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }
}
