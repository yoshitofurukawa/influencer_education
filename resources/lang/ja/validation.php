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


        'required' => ':attributeは入力必須項目です。',
        'date' => ':attribute は正しい日付形式で入力してください。',
        'date_format' => ':attribute は時刻形式（HH:MM）で入力してください。',
        'after_or_equal' => ':attribute は開始年月日以降の日付を指定してください。',

        'attributes' => [
            'delivery_from.*' => '開始年月日',
            'delivery_from_time.*' => '開始時間',
            'delivery_to.*' => '終了年月日',
            'delivery_to_time.*' => '終了時間',
        ],
    ];
