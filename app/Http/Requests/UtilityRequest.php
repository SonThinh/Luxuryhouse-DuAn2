<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UtilityRequest extends FormRequest
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
            'symbol' => 'required|',
            'key' => 'required',
            'icon' => 'required|',

        ];
    }

    public function messages()
    {
        return [
            'symbol.required' => 'Chưa nhập biểu tượng',
            'key.required' => 'Chưa nhập key',
            'icon.required' => 'Chưa nhập icon',

        ];
    }
}
