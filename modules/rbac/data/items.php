<?php
return [
    'viewCabinet' => [
        'type' => 2,
        'description' => 'Просмотр личного кабинета',
    ],
    'sendMessages' => [
        'type' => 2,
        'description' => 'Отправка сообщений',
    ],
    'createOrder' => [
        'type' => 2,
        'description' => 'Оформление заказа',
    ],
    'user' => [
        'type' => 1,
        'ruleName' => 'userRole',
        'children' => [
            'viewCabinet',
            'sendMessages',
            'createOrder',
        ],
    ],
    'atelierOwner' => [
        'type' => 1,
        'ruleName' => 'userRole',
        'children' => [
            'user',
        ],
    ],
    'storeOwner' => [
        'type' => 1,
        'ruleName' => 'userRole',
        'children' => [
            'user',
        ],
    ],
    'admin' => [
        'type' => 1,
        'ruleName' => 'userRole',
        'children' => [
            'user',
        ],
    ],
];
