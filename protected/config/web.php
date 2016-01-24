<?php
/**
 * Created by PhpStorm.
 * User: EARL
 * Date: 02.12.2015
 * Time: 15:21
 */

$config = [
    'id' => 'custom',
    'basePath' => dirname(__DIR__),
    'language' => 'ru_RU',
    'charset' => 'UTF-8',
    'params' => require(__DIR__ . '/params.php'),
    'bootstrap' => ['log'],
    'components' => [
        'formatter' => [
            'class' => 'yii\\i18n\\Formatter',
            'nullDisplay' => '<span class="not-set">(not set)</span>',
            'dateFormat' => 'medium',
            'timeFormat' => 'medium',
            'datetimeFormat' => 'medium',
           // 'booleanFormat' => ['<span class="glyphicon glyphicon-remove"></span> Не работает', '<span class="glyphicon glyphicon-ok"></span> Работает']
            'booleanFormat' => ['Не работает', 'Работает']
        ],
        'urlManager' => [
            'showScriptName' => false,
            'enablePrettyUrl' => true,
            'rules' => [
                '<module:\w+>/<controller:\w+>/<action:(\w|-)+>' => '<module>/<controller>/<action>',
                '<module:\w+>/<controller:\w+>/<action:(\w|-)+>/<id:\d+>' => '<module>/<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'request' => [
            'cookieValidationKey' => 'prokma.ru',
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
    ],
];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;