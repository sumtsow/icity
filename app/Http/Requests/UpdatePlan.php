<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlan extends FormRequest
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
        'price'=> 'required|numeric|min:0.01|max:99999999.99',
        'validity'=> 'required|integer|min:1|max:60',
        ];
        foreach(config('app.locales') as $locale) {
            $rules['name_'.$locale] = 'required|string|max:255';
            $rules['description_'.$locale] = 'string|max:65535|nullable';
        }
        return $rules;
    }
}
