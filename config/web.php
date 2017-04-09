<?php

$params = require(__DIR__ . '/params.php');
$baseUrl = str_replace('/web', '', (new \yii\web\Request)->getBaseUrl());
$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'timeZone'   => 'Asia/Ho_Chi_Minh',
    'language'   => 'vi',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'zfahQh-ewwgeuW6Q5M0ht-pHoWOSBicR',
            'baseUrl'             => $baseUrl,
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
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
        'db' => require(__DIR__ . '/db.php'),

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],

    ],
    'modules'    => [
        'gridview'    => [
            'class' => '\kartik\grid\Module',
        ],
        'datecontrol' => [
            'class'           => 'kartik\datecontrol\Module',
            'displaySettings' => [
                'date'     => 'php:d-m-Y',
                'time'     => 'H:i:s A',
                'datetime' => 'd-m-Y H:i:s A',
            ],
            'saveSettings'    => [
                'date'     => 'php:Y-m-d',
                'time'     => 'H:i:s',
                'datetime' => 'Y-m-d H:i:s',
            ],
            'autoWidget'      => true,
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    //	 configuration adjustments for 'dev' environment
    $config['bootstrap'][]      = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];
    $config['bootstrap'][]      = 'gii';
    $config['modules']['gii']   = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
