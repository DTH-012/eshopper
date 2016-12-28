<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class ProcRequest extends FormRequest
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
            'fileimg'=>'required',
            'txtProcID'=>'required|unique:products,idProducts',
            'txtProcName'=>'required|unique:products,NamePd',
        ];
    }
    public function messages()
    {
        return [
            'fileimg.required' => 'Vui lòng chọn hình ảnh',
            'txtProcID.required' => 'Vui lòng nhập mã sàn phẩm',
            'txtProcID.unique' => 'Mã sản phẩm đã tồn tại',
            'txtProcName.required' => 'Vui lòng nhập tên sàn phẩm',
            'txtProcName.unique' => 'Tên sản phẩm đã tồn tại',
        ];
    }
    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }
    /**
     * @return ParameterBag
     */
}
