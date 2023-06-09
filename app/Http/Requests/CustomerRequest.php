<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'name' => 'required',
                    'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'max:10', Rule::unique('customers')],
                    'email' => ['required', 'email', Rule::unique('customers')],
                    'personal_id' => ['required', 'regex:/([0-9]{9})\b/', 'max:12', Rule::unique('customers')]
                ];
            case 'PATCH':
            case 'PUT':
                return [
                    'name' => 'required',
                    'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'max:10', Rule::unique('customers')->ignore($this->customer, 'id')],
                    'email' => ['required', 'email', Rule::unique('customers')->ignore($this->customer, 'id')],
                    'personal_id' => ['required', 'regex:/([0-9]{9})\b/', 'max:12', Rule::unique('customers')->ignore($this->customer, 'id')]
                ];
        }
    }

    public function messages()
    {
        return [
            'name.required' => trans('site.customer.validation.name_not_empty'),
            'email.email' => trans('site.customer.validation.email_regex'),
            'email.unique' => trans('site.customer.validation.email_exist'),
            'email.required' => trans('site.customer.validation.email_not_empty'),
            'phone.required' => trans('site.customer.validation.phone_not_empty'),
            'phone.regex' => trans('site.customer.validation.phone_regex'),
            'phone.unique' => trans('site.customer.validation.phone_exist'),
            'phone.min' => trans('site.customer.validation.phone_min'),
            'phone.max' => trans('site.customer.validation.phone_max'),
            'personal_id.required' => trans('site.customer.validation.personal_id_not_empty'),
            'personal_id.regex' => trans('site.customer.validation.personal_id_regex'),
            'personal_id.unique' => trans('site.customer.validation.personal_id_exist'),
            'personal_id.max' => trans('site.customer.validation.personal_id_max'),
        ];
    }
}
