<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompany extends FormRequest
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
        foreach(config('app.locales') as $locale) {
            $rules['name_'.$locale] = 'required|string|max:255';
            $rules['description_'.$locale] = 'string|max:65535|nullable';
            
        }
        $rules['plan'] = 'required|integer';
        $rules['city'] = 'required|integer';
        $rules['address'] = 'string|max:255|nullable';        
        $rules['phone'] = 'string|max:12|nullable';
        $rules['email'] = 'required|max:127|unique:company,email';
        $rules['payment_state'] = 'string|max:3';
        $rules['expired'] = 'string|max:3';
        $rules['enabled'] = 'string|max:3';
        $rules['work_begin'] = 'date_format:H:i';
        $rules['work_finish'] = 'date_format:H:i';
        $rules['map'] = 'string|max:255|nullable';      
        $rules['website'] = 'url|max:255|nullable';
        $rules['skype'] = 'string|max:255|nullable'; 
        $rules['twitter'] = 'string|max:255|nullable';
        $rules['viber'] = 'string|max:255|nullable';
        $rules['options'] = 'string|max:255|nullable';        
        $rules['image'] = 'image';
        return $rules;
    }
}
