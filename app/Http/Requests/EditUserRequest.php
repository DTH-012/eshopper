<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class EditUserRequest extends FormRequest
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
            'txtUserName' => 'required',
            'txtUserEmail' =>'required|unique:users,email',
            'txtUserLevel' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'txtUserName.required' => 'Vui lòng nhập họ tên',
            'txtUserEmail.required' => 'Vui lòng nhập email',
            'txtUserEmail.unique' => 'Email đã tồn tại',
            'txtUserLevel.required' => 'Vui lòng nhập quyền hạn'
        ];
    }
    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }
}
