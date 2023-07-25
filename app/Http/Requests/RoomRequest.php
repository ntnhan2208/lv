<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoomRequest extends FormRequest
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
        switch ( $this->method()){
            case 'POST':
                return [
                    'name' => ['required','max:150'],
                    'amount' => 'required|numeric|min:1|max:15',
                    'acreage' => 'required|numeric|min:1|max:50',
                    'price' => 'required|numeric|min:1',
                    'description' => 'required',
                ];
            case 'PATCH':
            case 'PUT':
                return [
                    'name' => ['required'],
                    'amount' => 'required|numeric|min:1|max:15',
                    'acreage' => 'required|numeric|min:1|max:50',
                    'price' => 'required|numeric|min:1',
                    'description' => 'required',
                ];
        }
    }
    public function messages()
    {
        return [
            'name.required' => trans('site.room.validation.name_not_empty'),
            'amount.required' => trans('site.room.validation.amount_not_empty'),
            'amount.numeric' => trans('site.room.validation.amount_not_numeric'),
            'amount.min' => 'Số người tối thiểu phải là 1',
            'amount.max' => 'Số người tối đa là 15',
            'acreage.required' => 'Diện tích không được để trống',
            'acreage.min' => 'Diện tích tối thiểu phải là 1m2',
            'acreage.max' => 'Diện tích tối đa là 50m2',
            'price.required' => trans('site.room.validation.price_not_empty'),
            'price.numeric' => trans('site.room.validation.price_not_numeric'),
            'price.min' => 'Giá thuê không hợp lệ',
            'description.required' => trans('site.room.validation.description_not_empty'),
        ];
    }
}
