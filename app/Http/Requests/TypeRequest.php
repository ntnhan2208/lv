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
                    'name' => ['required',Rule::unique('types'),'max:150'],
                    'description' => 'required'
                ];
            case 'PATCH':
            case 'PUT':
                return  [
                    'name' => ['required',Rule::unique('types')->ignore($this->type,'id'),'max:150'],
                    'description' => 'required'
                ];
        }
    }
    public function messages()
    {
        return [
            'name.required' => trans('site.type.validation.name_not_empty'),
            'name.unique' => trans('site.type.validation.name_exist'),
            'description.required' => trans('site.type.validation.description_not_empty'),
            'name.max'=>'Tên loại căn hộ không được vượt quá 150 ký tự'
        ];
    }
}
