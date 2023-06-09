<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WidgetRequest extends FormRequest
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
        return[
            'name' 		=>  ['required'],
            'alias'    	=>  ['required']
        ];
	}
		
	public function messages()
    {
        return [
            'name.required' 	=> trans('site.admin.validation.name_not_empty'),
            'alias.required' 	=> trans('site.admin.alias_not_empty'),
        ];
    }
}
