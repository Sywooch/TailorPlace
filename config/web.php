<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'sourceLanguage' => 'en',
    'language' => 'ru',
    'charset' => 'utf-8',
    'timeZone' => 'Europe/Moscow',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '_vdr3r1gma5jcNqxJmZQUnyY7rtCsBCW',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'class' => 'yii\web\User',
            'identityClass' => 'app\modules\users\models\User',
            'loginUrl' => ['/user/default/login'],
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // TODO настроить отправку почты
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'view' => [
            'class' => 'yii\web\View',
            'renderers' => [
                'twig' => [
                    'class' => 'yii\twig\ViewRenderer',
                    //'cachePath' => '@runtime/Twig/cache',
                    //'options' => [], /*  Array of twig options */
                    'globals' => ['html' => '\yii\helpers\Html'],
                    'uses' => ['yii\bootstrap'],
                ],
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['guest'],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => false,
            'showScriptName' => false,
            'suffix' => '/',

            'rules' => [
            // Общее
                'captcha' => 'common/captcha',
                'feedback' => 'site/feedback',
                '404' => 'site/404',
                '403' => 'site/403',
            // Модуль [[Users]]
                '<_a:(login|logout|signup|activation|recovery|index|repair-password)>' => 'users/default/<_a>',
            // Модуль [[good]]
                'good' => 'good/default/index',
            // Личный кабинет
                'cabinet' => 'cabinet/default/index/',
                'cabinet/studio/<section:(all|vitrine|sale)>/' => 'cabinet/studio/index/',
                'cabinet/studio/<order:\w+>/' => 'cabinet/studio/index/',
                'cabinet/studio/<section:(all|vitrine|sale)>/<order:\w+>/' => 'cabinet/studio/index/',
            // Инициализация ролей
                'roles' => 'rbac/rbac/init/',
            ],
        ],
        'numberHelper' => 'app\components\NumberHelper',
        'db' => require(__DIR__ . '/db.php'),
    ],
    'modules' => [
        'gii' => 'yii\gii\Module',
        'users' => [
            'class' => 'app\modules\users\Users'
        ],
        'rbac' => [
            'class' => 'app\modules\rbac\Rbac'
        ],
        'cabinet' => [
            'class' => 'app\modules\cabinet\Cabinet'
        ],
        'good' => [
            'class' => 'app\modules\good\Good'
        ],
        'studio' => [
            'class' => 'app\modules\studio\Studio'
        ],
    ],
    'params' => $params,
];

Yii::setAlias('@root', realpath(dirname(__FILE__) . '/../'));

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
