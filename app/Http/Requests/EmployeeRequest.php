<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()){
            case 'POST':
                return [
                    'name' => ['required','max:150'],
                    'email' => ['required','email', Rule::unique('employees'),'max:150'],
                    'phone' => ['required','regex:/^([0-9\s\-\+\(\)]*)$/','min:10','max:10', Rule::unique('employees')],
                    'personal_id' => ['required','regex:/([0-9]{9})\b/','max:12', Rule::unique('employees')],
                ];
            case 'PATCH':
            case 'PUT':
                return [
                    'name' => ['required','max:150'],
                    'email' => ['required','email', Rule::unique('employees')->ignore($this->employee,'id'),'max:150'],
                    'phone' => ['required','regex:/^([0-9\s\-\+\(\)]*)$/','min:10','max:10', Rule::unique('employees')->ignore($this->employee,'id')],
                    'personal_id' => ['required','regex:/([0-9]{9})\b/','max:12', Rule::unique('employees')->ignore($this->employee,'id')],
                ];
        }
    }
    public function messages()
    {
        return [
            'name.required' => trans('site.employee.validation.name_not_empty'),
            'name.max' => 'Tên nhân viên không được vượt quá 150 ký tự',
            'personal_id.required' => trans('site.admin.validation.personal_id_not_empty'),
            'personal_id.regex' => trans('site.admin.validation.personal_id_regex'),
            'personal_id.unique' => trans('site.admin.validation.personal_id_exist'),
            'personal_id.max' => trans('site.admin.validation.personal_id_max'),
            'email.email' => trans('site.admin.validation.email_regex'),
            'email.unique' =>  trans('site.admin.validation.email_exist'),
            'email.required' => trans('site.admin.validation.email_not_empty'),
            'email.max' => 'Email không được vượt quá 150 ký tự',
            'phone.required' => trans('site.admin.validation.phone_not_empty'),
            'phone.regex' => trans('site.admin.validation.phone_regex'),
            'phone.unique' => trans('site.admin.validation.phone_exist'),
            'phone.min' => trans('site.admin.validation.phone_min'),
            'phone.max' => trans('site.admin.validation.phone_max'),
            'position.required' => trans('site.employee.validation.position_not_empty'),
        ];
    }
}
