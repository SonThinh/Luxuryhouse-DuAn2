<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HouseEditRequest extends FormRequest
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
            'name' => 'required',
            'house_number' => 'required',
            'selectCity' => 'required',
            'selectAreas' => 'required',
            'n_bed' => 'required',
            'n_bath' => 'required',
            'n_room' => 'required',
            'max_guest' => 'required',
            'description' => 'required',
            'rules' => 'required',
            'house_utilities' => 'required',
            'm_to_t' => 'required',
            'f_to_s' => 'required',
            'extra_guest' => 'required',
            'max_night' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Chưa nhập tên nhà',
            'house_number.required' => 'Chưa nhập số nhà',
            'selectCity.required' => 'Chưa chọn thành phố',
            'selectAreas.required' => 'Chưa nhập khu vực',
            'n_bed.required' => 'Chưa nhập số giường',
            'n_bath.required' => 'Chưa nhập số phòng tắm',
            'n_room.required' => 'Chưa nhập số phòng phủ',
            'max_guest.required' => 'Chưa nhập tối đa số khách',
            'description.required' => 'Chưa nhập mô tả',
            'rules.required' => 'Chưa nhập quy định chung',
            'house_utilities.required' => 'Chưa chọn các tiện ích',
            'm_to_t.required' => 'Chưa nhập giá thứ 2 tới thứ 5',
            'f_to_s.required' => 'Chưa nhập giá thứ 6 tới chủ nhật',
            'extra_guest.required' => 'Chưa nhập giá khách thêm',
            'max_night.required' => 'Chưa nhập số đêm tối thiểu',
        ];
    }
}
