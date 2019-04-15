<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AskQusetionRequest extends FormRequest
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
            'title' => 'required|max:255',
			'body' => 'required'
        ];
    }
	
    // This is redundant. And may have other pitfalls?
    public function messages()
    {
        return [
            'title.required' => 'obavezno polje.',
            'body.required' => 'i ovo je obaveyno polje.'
        ];
    }
	
public function attributes()
{
	/*
    return[
        //'title' => 'name'; //This will replace any instance of 'username' in validation messages with 'email'
        //'anyinput' => 'Nice Name',
    ];
*/
}	
	
}
