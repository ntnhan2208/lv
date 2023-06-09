<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class TypeRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        switch ( $this->method()){
            case 'POST':
                return [
                    'name' => ['required',Rule::unique('types')],
                    'description' => 'required'
                ];
            case 'PATCH':
            case 'PUT':
                return  [
                    'name' => ['required',Rule::unique('types')->ignore($this->type,'id')],
                    'description' => 'required'
                ];
        }
    }
    public function messages()
    {
        return [
            'name.required' => trans('site.type.validation.name_not_empty'),
            'name.unique' => trans('site.type.validation.name_exist'),
            'description.required' => trans('site.type.validation.description_not_empty')
        ];
    }
}
