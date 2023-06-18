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
                    'name' => ['required'],
                    'amount' => 'required|numeric',
                    'price' => 'required|numeric',
                    'description' => 'required',
                ];
            case 'PATCH':
            case 'PUT':
                return [
                    'name' => ['required'],
                    'amount' => 'required|numeric',
                    'price' => 'required|numeric',
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
            'price.required' => trans('site.room.validation.price_not_empty'),
            'price.numeric' => trans('site.room.validation.price_not_numeric'),
            'description.required' => trans('site.room.validation.description_not_empty'),
        ];
    }
}
