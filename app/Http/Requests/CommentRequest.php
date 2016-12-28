<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class CommentRequest extends FormRequest
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
            'txtemail' => 'required',
            'txtcontent' => 'required'

        ];
    }
    public function messages()
    {
        return [
            'txtname.required' => 'Vui lòng nhập họ tên',
            'txtemail.required' => 'Vui lòng nhập email',
            'txtcontent.required' => 'Vui lòng nhập phản hồi'
        ];
    }
    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }
}
