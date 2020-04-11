<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'password' => 'required|min:8|regex:/^(?=.*?[a-zA-Z])(?=.*[0-9]).*$/|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu phải hơn 8 kí tự',
            'password.regex' => 'Mật khẩu phải gồm chữ in hoa, chữ thường, chữ số, không có kí tự đặc biệt',
            'password.confirmed' => 'Xác nhận mật khẩu không đúng',
        ];
    }
}