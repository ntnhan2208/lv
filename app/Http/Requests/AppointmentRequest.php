<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AppointmentRequest extends FormRequest
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

    public function rules()
    {
        return[
            'name' 	=>  ['required','max:150'],
            'phone'    	=>  ['required'],
            'date' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' 	=> 'Tên khách hàng không được để trống',
            'name.max' 	=> 'Tên khách hàng không được vượt 150 ký tự',
            'phone.required' 	=> 'Số điện thoại hàng không được để trống',
            'date.required' 	=> 'Ngày hẹn không được để trống',
        ];
    }
}
