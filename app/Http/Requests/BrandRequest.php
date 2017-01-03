<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class BrandRequest extends FormRequest
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
            'txtBrandID'=>'required|unique:brands,idBRANDS',
            'txtBrandName'=>'required|unique:brands,BRANDName',
        ];
    }
    public function messages()
    {
        return [
            'txtBrandID.required' => 'Vui lòng nhập mã nhà sx',
            'txtBrandID.unique' => 'Mã nhà sx đã tồn tại',
            'txtBrandName.required' => 'Vui lòng nhập tên nhà sx',
            'txtBrandName.unique' => 'Tên nhà sx đã tồn tại',
        ];
    }
    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }
}
