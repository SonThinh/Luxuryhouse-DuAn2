<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AreaRequest extends FormRequest
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
            'city_name' => 'required',
            'area_name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'city_name.required' => 'Chưa chọn thành phố',
            'area_name.required' => 'Chưa nhập tên khu vực',
        ];
    }
}
