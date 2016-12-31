<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Auth;

class EditAccountRequest extends FormRequest
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
        $user = Auth::user();
        return [
            'txtname' => 'required',
            'txtEmail' => 'required',
            'txtOldPassword' => 'required',
            'txtPassword' => 'required|different:txtOldPassword',
            'txtRePassword' => 'required|same:txtPassword',
        ];
    }
    public function messages()
    {
        return [
            'txtname.required' => 'Vui lòng nhập họ tên',
            'txtEmail.required' => 'Vui lòng nhập Email',
            'txtEmail.unique' => 'Email đã tồn tại',
            'txtOldPassword.required' => 'Vui lòng nhập mật khẩu cũ',
            'txtPassword.required' => 'Vui lòng nhập mật khẩu mới',
            'txtPassword.different' => 'Mật khẩu mới phải khác mật khẩu cũ',
            'txtRePassword.required' => 'Vui lòng nhập xác nhận mật khẩu',
            'txtRePassword.same' => 'Mật khẩu xác nhận không khớp',
        ];
    }
    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }
}
