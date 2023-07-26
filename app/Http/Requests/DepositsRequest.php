<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepositsRequest extends FormRequest
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
            'date' => 'required|date|after:yesterday',
            'date_start' => 'required|date|after:yesterday',
            'price' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' 	=> 'Tên khách hàng không được để trống',
            'phone.required' 	=> 'Số điện thoại hàng không được để trống',
            'date.required' 	=> 'Ngày nhận cọc không được để trống',
            'date.after' 	=> 'Ngày nhận cọc phải từ ngày hiện tại',
            'date_start.required' 	=> 'Ngày dự kiến dọn vào không được để trống',
            'date_start.after' 	=> 'Ngày dự kiến dọn vào phải từ ngày hiện tại',
            'price.required' 	=> 'Số tiền cọc không được để trống',

        ];
    }
}
