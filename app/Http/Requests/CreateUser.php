<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUser extends FormRequest
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
            'lastname' => 'required|alpha|max:255',
            'firstname' => 'required|alpha|max:255',
            'patronymic' => 'alpha|max:255|nullable',
            'email' => 'required|max:127|unique:user,email',
            'role' => 'required|max:15',
            'company' => 'string|max:255|nullable',
            'birthdate' => 'date|nullable',
            'city' => 'string|max:63|nullable',
            'phone' => 'string|max:12|nullable',
            'skype' => 'max:255|nullable',
            'twitter' => 'max:255|nullable',
            'viber' => 'max:255|nullable',
            'loyality_card' => 'max:31|nullable',
            'options' => 'max:255|nullable',
        ];
    }
}
