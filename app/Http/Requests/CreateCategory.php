<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategory extends FormRequest
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
        }
        $rules['options'] = 'string|max:255|nullable';
        $rules['image'] = 'image';
        return $rules;
    }
}
