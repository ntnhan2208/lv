<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;

class PermissionRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return[
            'name' => 'required',
            'slug' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('site.admin.validation.name_not_empty'),
            'slug.required' => trans('site.permission.slug_not_empty'),
        ];
    }
}
