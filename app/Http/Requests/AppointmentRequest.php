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
            'name' 	=>  ['required'],
            'phone'    	=>  ['required'],
            'date' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' 	=> 'Tên khách hàng không được để trống',
            'phone.required' 	=> 'Số điện thoại hàng không được để trống',
            'date.required' 	=> 'Ngày hẹn không được để trống',
        ];
    }
}
