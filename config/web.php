<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'charset' => 'UTF-8',
    'language' => 'en',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'XS7UUKVtHMxUjKW7LCFQ4JQglUGj7Rnb',
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
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
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
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
                '/article/<slug:.+>/' => 'news/single',
                '/news/' => 'news/index',
                '/blog/<id:.+>/' => 'news/category',
                '/group/private/<id:.+>/<value:.+>/' => 'group/private',
                '/group/create' => 'group/create',
                '/group/invite' => 'group/invite',
                '/group/delete-comment' => 'group/delete-comment',
                '/delete-post/<id:.+>/' => 'group/delete-post',
                '/my-groups/' => 'profile/groups',
                '/group/leave/<id:.+>/' => 'group/leave',
                '/group/<slug:.+>/' => 'group/single',
                '/user/<id:.+>/' => 'profile/friend',
                '/connections/<user:\d>/' => 'profile/connections',
                '/profile/<id:\d>/' => 'page/profile',
                '/page/edit/<id:\d>/' => 'page/edit',
                '/about/<user:.+>/' => 'profile/about',
                'signup' => 'account/signup',
                'login' => 'account/login',
                'logout' => 'site/logout',
                '<controller:\w+>/<action:\w+>/*'=>'<controller>/<action>',
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
