<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
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
            'email_verified_at' => 'string',
            'role' => 'required|max:15',
            'company' => 'integer|max:11|nullable',
            'birthdate' => 'date|nullable',
            'city' => 'integer|max:11|nullable',
            'phone' => 'string|max:12|nullable',
            'skype' => 'max:255|nullable',
            'twitter' => 'max:255|nullable',
            'viber' => 'max:255|nullable',
            'loyality_card' => 'max:31|nullable',
            'options' => 'max:255|nullable',
        ];
    }
}
