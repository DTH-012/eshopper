<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class CatRequest extends FormRequest
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
            'txtCatID'=>'required|unique:category,idCategory',
            'txtCatName'=>'required|unique:category,Name',
        ];
    }
    public function messages()
    {
        return [
            'txtCatID.required' => 'Vui lòng nhập mã loại',
            'txtCatID.unique' => 'Mã loại đã tồn tại',
            'txtCatName.required' => 'Vui lòng nhập tên loại',
            'txtCatName.unique' => 'Tên loại đã tồn tại',
        ];
    }
    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }
}
