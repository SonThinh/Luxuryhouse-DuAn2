<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\JsonResponse;
class AddCityRequest extends FormRequest
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
            'city_description' => 'required',
            'image_city' => 'required|',
        ];
    }

    public function messages()
    {
        return [
            'city_name.required' => 'Chưa nhập tên thành phố',
            'city_description.required' => 'Chưa nhập mô tả thành phố',
            'image_city.required' => 'Chưa nhập hình ảnh',
        ];
    }
}
