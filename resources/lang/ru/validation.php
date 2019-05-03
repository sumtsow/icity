<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute должен быть принят.',
    'active_url' => ':attribute не соответствует формату URL.',
    'after' => ':attribute должно быть датой после :date.',
    'after_or_equal' => ':attribute должно быть датой после или равно :date.',
    'alpha' => ':attribute может содержать только буквы.',
    'alpha_dash' => ':attribute может содержать только буквы.',
    'alpha_num' => ':attribute могут содержать только буквы и цифры.',
    'array' => ':attribute должно быть массивом.',
    'before' => ':attribute должно быть датой ранее :date.',
    'before_or_equal' => ':attribute должно быть датой ранее или равно :date.',
    'between' => [
        'numeric' => ':attribute должно быть между :min и :max.',
        'file' => ':attribute должно быть между :min и :max килобайт.',
        'string' => ':attribute должно быть между :min и :max символов.',
        'array' => ':attribute должно быть между :min и :max наименований.',
    ],
    'boolean' => ':attribute поле может быть только true или false.',
    'confirmed' => ':attribute подтверждение не совпадает.',
    'date' => ':attribute не является корректной датой.',
    'date_equals' => ':attribute должен быть датой равной :date.',
    'date_format' => ':attribute не соответствует формату :format.',
    'different' => ':attribute и :other должны отличаться.',
    'digits' => ':attribute должно быть :digits единиц.',
    'digits_between' => ':attribute должно быть :min and :max единиц.',
    'dimensions' => ':attribute имеет недопустимые размеры изображения.',
    'distinct' => ':attribute поле имеет повторяющееся значение.',
    'email' => ':attribute не соответствует формату адреса электронной почты.',
    'exists' => 'Выделенный :attribute недействителен.',
    'file' => ':attribute должно быть файлом.',
    'filled' => ':attribute поле должно иметь значение.',
    'gt' => [
        'numeric' => ':attribute должно быть более :value.',
        'file' => ':attribute должно быть более :value килобайт.',
        'string' => ':attribute должно быть более :value символов.',
        'array' => ':attribute должно быть более :value наименований.',
    ],
    'gte' => [
        'numeric' => ':attribute должно быть более или равно :value.',
        'file' => ':attribute должно быть более или равно :value килобайт.',
        'string' => ':attribute должно быть более или равно :value символов.',
        'array' => ':attribute должно иметь :value или более единиц.',
    ],
    'image' => ':attribute должно быть изображением.',
    'in' => 'Выделенный :attribute недействителен.',
    'in_array' => ':attribute поле не существует в :other.',
    'integer' => ':attribute должно быть целым числом.',
    'ip' => ':attribute должно быть действительным IP-адресом.',
    'ipv4' => ':attribute должно быть действительным IPv4 адресом.',
    'ipv6' => ':attribute должно быть действительным IPv6 адресом.',
    'json' => ':attribute  должно быть действительной строкой JSON.',
    'lt' => [
        'numeric' => ':attribute должно быть меньше :value.',
        'file' => ':attribute должно быть меньше :value килобайт.',
        'string' => ':attribute должно быть меньше :value символов.',
        'array' => ':attribute должно быть меньше :value наименований.',
    ],
    'lte' => [
        'numeric' => ':attribute должно быть меньше или равно :value.',
        'file' => ':attribute должно быть меньше или равно :value килобайт.',
        'string' => ':attribute должно быть меньше или равно :value символов.',
        'array' => ':attribute должно быть меньше или равно :value наименований.',
    ],
    'max' => [
        'numeric' => ':attribute должно быть не больше :max.',
        'file' => ':attribute должно быть не больше :max килобайт.',
        'string' => ':attribute должно быть не больше :max символов.',
        'array' => ':attribute должно быть не больше than :max наименований.',
    ],
    'mimes' => ':attribute должно быть файлом типа: :values.',
    'mimetypes' => ':attribute должно быть фалом типа: :values.',
    'min' => [
        'numeric' => ':attribute должно быть не менее :min.',
        'file' => ':attribute должно быть не менее :min килобайт.',
        'string' => ':attribute должно быть не менее :min символов.',
        'array' => ':attribute должно быть не менее :min наименований.',
    ],
    'not_in' => 'Выделенный :attribute недействителен.',
    'not_regex' => ':attribute имеет неверный формат.',
    'numeric' => ':attribute должно быть числом.',
    'present' => ':attribute поле должно присутствовать.',
    'regex' => ':attribute имеет неверный формат.',
    'required' => ':attribute поле является обязательным.',
    'required_if' => ':attribute поле является обязательным при :other равно :value.',
    'required_unless' => ':attribute поле является обязательным если :other находится в :values.',
    'required_with' => ':attribute поле является обязательным если определено :values.',
    'required_with_all' => ':attribute поле является обязательным если определены :values .',
    'required_without' => ':attribute поле является обязательным если не определено :values.',
    'required_without_all' => ':attribute поле является обязательным если не определены :values.',
    'same' => ':attribute и :other должны совпадать.',
    'size' => [
        'numeric' => ':attribute должно быть :size.',
        'file' => ':attribute должно быть :size килобайт.',
        'string' => ':attribute должно быть :size символов.',
        'array' => ':attribute должно содержать :size наименований.',
    ],
    'starts_with' => ':attribute должно начинаться с одного из: :values',
    'string' => ':attribute должно быть строкой.',
    'timezone' => ':attribute должно быть действительной временной зоной.',
    'unique' => ':attribute уже получен.',
    'uploaded' => ':attribute не был загружен из-за ошибки.',
    'url' => ':attribute имеет неверный формат.',
    'uuid' => ':attribute должен быть действительным UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
