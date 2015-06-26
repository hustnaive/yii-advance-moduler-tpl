<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

$modules = require(__DIR__ . '/modules.php');

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'defaultRoute' => 'demo/site/index',
    'modules' => $modules,
    'components' => [
        'urlManager'=>[
            'enablePrettyUrl'  => true,
            'showScriptName' => false,
        ],
        'user' => [
            'identityClass' => 'common\models\FakeUser',
            'enableAutoLogin' => true,
            'loginUrl'=> ['demo/site/login']
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
        'errorHandler' => [
            'errorAction' => 'demo/site/error',
        ],
    ],
    'params' => $params,
];
