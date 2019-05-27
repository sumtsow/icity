<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCompany extends FormRequest
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
        $rules = [
        'plan'=> 'required|integer',
        'city'=> 'required|integer',
        'address'=> 'string|max:255|nullable',        
        'phone'=> 'string|max:12|nullable',
        'email'=> 'required|max:127|unique:company,email',
        'payment_state'=> 'string|max:3',
        'expired'=> 'string|max:3',
        'enabled'=> 'string|max:3',
        'work_begin'=> 'date_format:H:i',
        'work_finish'=> 'date_format:H:i',
        'map'=> 'string|max:255|nullable',      
        'website'=> 'url|max:255|nullable',
        'skype'=> 'string|max:255|nullable', 
        'twitter'=> 'string|max:255|nullable',
        'viber'=> 'string|max:255|nullable',
        'options'=> 'string|max:255|nullable',        
        'image'=> 'image',            
        ];
        foreach(config('app.locales') as $locale) {
            $rules['name_'.$locale] = 'required|string|max:255';
            $rules['description_'.$locale] = 'string|max:65535|nullable';
        }
        return $rules;
    }
}
