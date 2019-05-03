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

    'accepted' => ':attribute має бути прийнятий.',
    'active_url' => ':attribute не відповідає формату URL.',
    'after' => ':attribute має бути датою після :date.',
    'after_or_equal' => ':attribute має бути датою не раніше :date.',
    'alpha' => ':attribute може містити лише літери.',
    'alpha_dash' => ':attribute може містити лише літери.',
    'alpha_num' => ':attribute можуть містити лише літери та цифри.',
    'array' => ':attribute має бути масивом.',
    'before' => ':attribute має бути датою раніше :date.',
    'before_or_equal' => ':attribute має бути датою не пізніше :date.',
    'between' => [
        'numeric' => ':attribute має бути між :min та :max.',
        'file' => ':attribute має бути між :min та :max кілобайтів.',
        'string' => ':attribute має бути між :min та :max символів.',
        'array' => ':attribute має бути між :min та :max найменувань.',
    ],
    'boolean' => ':attribute поле може бути лише true або false.',
    'confirmed' => ':attribute підтвердження не співпадає.',
    'date' => ':attribute не є корректною датою.',
    'date_equals' => ':attribute має бути датою рівною :date.',
    'date_format' => ':attribute не відповідає формату :format.',
    'different' => ':attribute та :other повинні відрізнятися.',
    'digits' => ':attribute має бути :digits одиниць.',
    'digits_between' => ':attribute має бути :min and :max одиниць.',
    'dimensions' => ':attribute має неприпустимі розміри зображення.',
    'distinct' => ':attribute поле має значення, що повторюється.',
    'email' => ':attribute не відповідає формату адреси електронної пошти.',
    'exists' => 'Виділений :attribute є недійсним.',
    'file' => ':attribute має бути файлом.',
    'filled' => ':attribute поле повинне мати значення.',
    'gt' => [
        'numeric' => ':attribute має бути більше :value.',
        'file' => ':attribute має бути більше :value кілобайтів.',
        'string' => ':attribute має бути більше :value символів.',
        'array' => ':attribute має бути більше :value найменувань.',
    ],
    'gte' => [
        'numeric' => ':attribute має бути більше або дорівнювати :value.',
        'file' => ':attribute має бути більше або дорівнювати :value кілобайтів.',
        'string' => ':attribute має бути більше або дорівнювати :value символів.',
        'array' => ':attribute повинне мати :value або більше одиниць.',
    ],
    'image' => ':attribute має бути зображенням.',
    'in' => 'Виділений :attribute є недійсним.',
    'in_array' => ':attribute поле не існує в :other.',
    'integer' => ':attribute має бути цілим числом.',
    'ip' => ':attribute має бути дійсною IP-адресом.',
    'ipv4' => ':attribute має бути дійсною IPv4 адресою.',
    'ipv6' => ':attribute має бути дійсною IPv6 адресою.',
    'json' => ':attribute має бути дійсним рядком JSON.',
    'lt' => [
        'numeric' => ':attribute має бути меньше :value.',
        'file' => ':attribute має бути меньше :value кілобайтів.',
        'string' => ':attribute має бути меньше :value символів.',
        'array' => ':attribute має бути меньше :value найменувань.',
    ],
    'lte' => [
        'numeric' => ':attribute має бути меньше або дорівнювати :value.',
        'file' => ':attribute має бути меньше або дорівнювати :value кілобайтів.',
        'string' => ':attribute має бути меньше або дорівнювати :value символів.',
        'array' => ':attribute має бути меньше або дорівнювати :value найменувань.',
    ],
    'max' => [
        'numeric' => ':attribute має бути не більше :max.',
        'file' => ':attribute має бути не більше :max кілобайтів.',
        'string' => ':attribute має бути не більше :max символів.',
        'array' => ':attribute має бути не більше than :max найменувань.',
    ],
    'mimes' => ':attribute має бути файлом типу: :values.',
    'mimetypes' => ':attribute має бути фалом типу: :values.',
    'min' => [
        'numeric' => ':attribute має бути не менше :min.',
        'file' => ':attribute має бути не менше :min кілобайтів.',
        'string' => ':attribute має бути не менше :min символів.',
        'array' => ':attribute має бути не менше :min найменувань.',
    ],
    'not_in' => 'Виділений :attribute є недійсним.',
    'not_regex' => ':attribute має невірний формат.',
    'numeric' => ':attribute має бути числом.',
    'present' => ':attribute поле має бути наявним.',
    'regex' => ':attribute має невірний формат.',
    'required' => ":attribute поле є обов'язковим.",
    'required_if' => ":attribute поле є обов'язковим при :other дорівнює :value.",
    'required_unless' => ":attribute поле є обов'язковим якщо :other знаходиться в :values.",
    'required_with' => ":attribute поле є обов'язковим якщо визначене :values.",
    'required_with_all' => ":attribute поле є обов'язковим якщо визначені :values .",
    'required_without' => ":attribute поле є обов'язковим якщо не визначене :values.",
    'required_without_all' => ":attribute поле є обов'язковим якщо не определени :values.",
    'same' => ':attribute та :other мають співпадати.',
    'size' => [
        'numeric' => ':attribute має бути :size.',
        'file' => ':attribute має бути :size кілобайтів.',
        'string' => ':attribute має бути :size символів.',
        'array' => ':attribute має містити :size найменувань.',
    ],
    'starts_with' => ':attribute має починаться з одного з: :values',
    'string' => ':attribute має бути рядком.',
    'timezone' => ':attribute має бути дійсною часовою зоною.',
    'unique' => ':attribute вже отриманий.',
    'uploaded' => ':attribute не було завантажено через помилку.',
    'url' => ':attribute має невірний формат.',
    'uuid' => ':attribute має бути дійсним UUID.',

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
