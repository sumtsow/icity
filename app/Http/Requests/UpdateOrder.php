<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateOrder extends FormRequest
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
            'state' => 'required|string|in:not confirmed,confirmed,completed,canceled',
            'payment' => 'required|integer|min:0|max:100',
            'description' => 'string|nullable',
            'lead_time_begin' => 'required|date',
            'lead_time_finish' => 'required|after:lead_time_begin',
            'options' => 'string|nullable',
            'service' => 'string|nullable',
            //'number' => 'integer|min:1',
        ];
    }
}
