<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;

class PasswordRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return[
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ];
    }

    public function messages()
    {
        return [
            'old_password.required' => trans('site.admin.validation.old_password_not_empty'),
            'new_password.required' => trans('site.admin.validation.new_password_not_empty'),
            'confirm_password.required' => trans('site.admin.validation.confirm_password_not_empty'),
            'confirm_password.same' => trans('site.admin.validation.same_password')
        ];
    }
}
