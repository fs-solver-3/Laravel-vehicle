<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Settings
    |--------------------------------------------------------------------------
    |
    | In here you can define all the settings used in your app, it will be
    | available as a settings page where user can update it if needed
    | create sections of settings with a type of input.
    */

    'app' => [

        'title' => 'Генеральная',
        'desc' => 'Все общие настройки для приложения',
        'icon' => 'glyphicon glyphicon-sunglasses',

        'elements' => [
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'app_name',
                'label' => 'Название приложения',
                'class' => 'col-md-12 col-xs-12',
                'rules' => 'required|min:2|max:50'
            ]
        ]
    ],


    'payment' => [

        'title' => 'Оплата',
        'desc' => 'Настройки оплаты',
        'icon' => 'glyphicon glyphicon-usd',

        'elements' => [

            [
                'type' => 'select',
                'name' => 'PAYPAL_MODE',
                'label' => 'PAYPAL_MODE',
                'rules' => 'required',
                'class' => 'col-md-6 col-xs-12',
                'options' => [
                    'live' => 'live',
                    'sandbox' => 'sandbox'
                ]
            ],
            [
                'type' => 'select',
                'name' => 'paypal_enable',
                'label' => 'Paypal Включить',
                'rules' => 'required',
                'class' => 'col-md-6 col-xs-12',
                'options' => [
                    '1' => 'On',
                    '0' => 'Off'
                ]
            ],
            [
                'type' => 'select',
                'name' => 'gold_enable',
                'label' => 'Золотой Включить',
                'rules' => 'required',
                'class' => 'col-md-4 col-xs-12',
                'options' => [
                    '1' => 'On',
                    '0' => 'Off'
                ]
            ],
            [
                'type' => 'select',
                'name' => 'advcash_enable',
                'label' => 'Advcash Включить',
                'rules' => 'required',
                'class' => 'col-md-4 col-xs-12',
                'options' => [
                    '1' => 'On',
                    '0' => 'Off'
                ]
            ],
            [
                'type' => 'select',
                'name' => 'tinkoff_enable',
                'label' => 'Тинькофф Включить',
                'rules' => 'required',
                'class' => 'col-md-4 col-xs-12',
                'options' => [
                    '1' => 'On',
                    '0' => 'Off'
                ]
            ]
        ],
        'desc_2' => 'Payment Settings',
    ], 

    // 'MLM' => [

    //     'title' => 'MLM',
    //     'desc' => 'MLM settings',
    //     'icon' => 'glyphicon glyphicon-education',

    //     'elements' => [
    //         [
    //             'type' => 'select', // input fields type
    //             'data' => 'boolean', // data type, string, int, boolean
    //             'name' => 'set_mlm', // unique name for field
    //             'label' => 'Turn on MLM System?',
    //             'rules' => 'required|boolean', // validation rule of laravel
    //             'class' => 'col-md-12 col-xs-12',
    //             'options' => [
    //                 '1' => 'Yes',
    //                 '0' => 'No'
    //             ]
    //         ]
    //     ]
    // ],

    'email' => [

        'title' => 'электронное письмо',
        'desc' => 'Настройки электронной почты для приложения',
        'icon' => 'glyphicon glyphicon-envelope',

        'elements' => [
            [
                'type' => 'email',
                'name' => 'from_email',
                'label' => 'По электронной почте',
                'rules' => 'required',
                'class' => 'col-md-4 col-xs-12',
            ],
            [
                'type' => 'text',
                'name' => 'from_name',
                'label' => 'От имени',
                'class' => 'col-md-4 col-xs-12',
                'rules' => 'required|min:2|max:50'
            ],
            [
                'type' => 'text',
                'name' => 'email_subject',
                'label' => 'Тема письма',
                'class' => 'col-md-4 col-xs-12',
                'rules' => 'required|min:2|max:50'
            ]
        ]
    ],
    'yandex' => [

        'title' => 'Яндекс метрика',
        'desc' => 'Яндекс настройки для приложения',

        'elements' => [
            [
                'type' => 'textarea',
                'name' => 'yandex_code',
                'class' => 'col-md-12 col-xs-12',
                'label' => 'Код:',
                'rules' => 'min:2'
            ]
        ]
    ],
    'google' => [

        'title' => 'Гугл Аналитика',
        'desc' => 'Настройки Google для приложения',
        'icon' => 'glyphicon glyphicon-education',
        'elements' => [
            [
                'type' => 'textarea',
                'name' => 'google_code',
                'class' => 'col-md-12 col-xs-12',
                'label' => 'Код:',
                'rules' => 'min:2'
            ],
            [
                'type' => 'textarea',
                'name' => 'google_tag_code',
                'class' => 'col-md-12 col-xs-12',
                'label' => 'Код тега Google',
                'rules' => 'min:2'
            ],
            [
                'type' => 'textarea',
                'name' => 'google_tag_body_code',
                'class' => 'col-md-12 col-xs-12',
                'label' => 'Код тега Google после тега тела',
                'rules' => 'min:2'
            ]
        ]
    ],
    'sms' => [

        'title' => 'СМС рассылка',
        'desc' => 'Настройки SMS для приложения',

        'elements' => [
            [
                'type' => 'text',
                'name' => 'sms_api_key',
                'label' => 'Ключ API',
                'class' => 'col-md-12 col-xs-12',
                'rules' => 'required|min:2|max:50'
            ]
        ]
    ],
    'radius' => [

        'title' => 'Радиус расстояния',
        'desc' => 'Радиус расстояния',

        'elements' => [
            [
                'type' => 'text',
                'name' => 'radius',
                'label' => 'Радиус',
                'class' => 'col-md-12 col-xs-12',
                'rules' => 'required|min:2|max:50'
            ]
        ]
    ],
];