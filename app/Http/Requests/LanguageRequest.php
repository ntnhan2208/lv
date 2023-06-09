<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;

class LanguageRequest extends FormRequest
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
        return [
            'name' => 'required',
            'slug' => 'required',
            'code' => 'required',
            'flag' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('site.language.validation.name_required'),
            'slug.required' => trans('site.language.validation.slug_required'),
            'code.required' => trans('site.language.validation.code_required'),
            'flag.required' => trans('site.language.validation.flag_required'),
        ];
    }
}
