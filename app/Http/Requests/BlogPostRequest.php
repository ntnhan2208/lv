<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlogPostRequest extends FormRequest
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
            'name_lang' 		=>  ['required', Rule::unique('blog_posts')->ignore($this->blog_post,'id')],
            'slug_lang'    	=>  ['required', Rule::unique('blog_posts')->ignore($this->blog_post,'id')],
            'categories.*' 	=> ['integer'],
            'categories'   	=> ['array'],
        ];
		}
		
		public function messages()
    {
        return [
            'name_lang.unique' 		=> trans('site.admin.validation.name_exist'),
            'slug_lang.unique' 		=> trans('site.admin.validation.name_exist'),
            'name_lang.required' 	=> trans('site.admin.validation.name_not_empty'),
            'slug_lang.required' 	=> trans('site.admin.validation.name_not_empty'),
        ];
    }
}
