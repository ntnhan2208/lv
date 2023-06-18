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
            'deadline'    	=>  ['required'],
            'date' => ['required'],
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
            'date.required' 	=> 'Ngày lập hóa đơn không được để trống',
            'old_electric.required' 	=> 'Số điện cũ không được để trống',
            'new_electric.required' 	=> 'Số điện mới không được để trống',
            'old_water.required' 	=> 'Số nước cũ không được để trống',
            'new_water.required' 	=> 'Số nước mới không được để trống',
        ];
    }
}
