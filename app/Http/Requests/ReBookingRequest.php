<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReBookingRequest extends FormRequest
{

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
        switch ($this->method()) {
            case 'POST':
                return [
                    'date_start' => 'required|after:yesterday',
                    'date_end' => 'required|after:date_start'
                ];
            case 'PATCH':
            case 'PUT':
                return [
                    'date_start' => 'required',
                    'date_end' => 'required|after:date_start'
                ];
        }

    }

    public function messages()
    {
        return [
            'date_start.required' => trans('site.booking.validation.date_start_not_empty'),
            'date_start.after' => trans('site.booking.validation.date_start_after'),
            'date_end.required' => trans('site.booking.validation.date_end_not_empty'),
            'date_end.after' => trans('site.booking.validation.date_end_after')
        ];
    }
}
