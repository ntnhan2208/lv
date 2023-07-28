<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BillRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return[
            'month' 	=>  ['required'],
            'deadline'    	=>  'required|date|after:date',
            'date' => 'required|date|after:yesterday|before:tomorrow',
            'old_electric' => ['required'],
            'new_electric' => ['required'],
            'old_water' => ['required'],
            'new_water' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'month.required' 	=> 'Tháng thu tiền thuê không được để trống',
            'deadline.required' 	=> 'Thời gian đóng tiền không được để trống',
            'deadline.before' 	=> 'Thời gian đóng tiền phải sau ngày lập hóa đơn',
            'date.required' 	=> 'Ngày lập hóa đơn không được để trống',
            'date.before' 	=> 'Ngày lập hóa đơn phải là ngày hiện tại',
            'date.after' 	=> 'Ngày lập hóa đơn phải là ngày hiện tại',
            'old_electric.required' 	=> 'Số điện cũ không được để trống',
            'new_electric.required' 	=> 'Số điện mới không được để trống',
            'old_water.required' 	=> 'Số nước cũ không được để trống',
            'new_water.required' 	=> 'Số nước mới không được để trống',
        ];
    }
}
