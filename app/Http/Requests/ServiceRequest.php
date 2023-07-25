<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class ServiceRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        switch ( $this->method()) {
            case 'POST':
                return [
                    'name' => ['required',Rule::unique('services'),'max:150'],
                    'description' => 'required',
                    'price' => 'required|numeric|min:1',
                ];
            case 'PATCH':
            case 'PUT':
                return [
                    'name' => ['required',Rule::unique('services')->ignore($this->service,'id'),'max:150'],
                    'description' => 'required',
                    'price' => 'required|numeric|min:1',
                ];
        }
    }
    public function messages()
    {
        return [
            'name.required' => trans('site.service.validation.name_not_empty'),
            'name.unique' => trans('site.service.validation.name_exist'),
            'description.required' => trans('site.service.validation.description_not_empty'),
            'price.required' => trans('site.service.validation.price_not_empty'),
            'price.numeric' => trans('site.service.validation.price_not_numeric'),
            'price.min' => 'Giá không hợp lệ',
            'name.max'=>'Tên dịch vụ không được vượt quá 150 ký tự'
        ];
    }
}
