<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateService extends FormRequest
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
            $rules['description_'.$locale] = 'required|string|max:65535';
        }
        $rules['unit'] = 'required|string|max:5';        
        $rules['category'] = 'required|integer';
        $rules['company'] = 'required|integer';
        $rules['price'] = 'required|numeric';
        $rules['minimum_batch'] = 'integer|min:1';
        $rules['maximum_batch'] = 'integer|min:1';
        $rules['discount'] = 'integer|min:0|max:100';
        $rules['image'] = 'image';
        $rules['options'] = 'string|max:255|nullable';
        return $rules;
    }
}
