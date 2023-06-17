<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;

class AdminRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        switch ($this->method()){
            case 'POST':
                return [
                    'name' => 'required',
                    'email' => ['required','email', Rule::unique('admins')],
                    'phone' => ['required','regex:/^([0-9\s\-\+\(\)]*)$/','min:10','max:10', Rule::unique('admins')],
                    'personal_id' => ['required','min:9','max:12', Rule::unique('admins')],
                    'password' => 'required',
                ];
            case 'PATCH':
            case 'PUT':
                return [
                    'name' => 'required',
                    'email' => ['required', 'email', Rule::unique('admins')->ignore($this->admin,'id')],
                    'phone' => ['required','regex:/^([0-9\s\-\+\(\)]*)$/','min:10','max:10', Rule::unique('admins')->ignore($this->admin,'id')],
                    'personal_id' => ['required','min:9','max:12', Rule::unique('admins')->ignore($this->admin,'id')],
                ];
        }
    }

    public function messages()
    {
        return [
            'name.required' => trans('site.admin.validation.name_not_empty'),
            'email.email' => trans('site.admin.validation.email_regex'),
            'email.unique' =>  trans('site.admin.validation.email_exist'),
            'email.required' => trans('site.admin.validation.email_not_empty'),
            'phone.required' => trans('site.admin.validation.phone_not_empty'),
            'phone.regex' => trans('site.admin.validation.phone_regex'),
            'phone.unique' => trans('site.admin.validation.phone_exist'),
            'phone.min' => trans('site.admin.validation.phone_min'),
            'phone.max' => trans('site.admin.validation.phone_max'),
            'personal_id.required' => trans('site.admin.validation.personal_id_not_empty'),
            'personal_id.regex' => trans('site.admin.validation.personal_id_regex'),
            'personal_id.max' => trans('site.admin.validation.personal_id_max'),
            'personal_id.unique' => trans('site.admin.validation.personal_id_exist'),
            'password.required' => trans('site.admin.validation.password_not_empty'),
        ];
    }
}
