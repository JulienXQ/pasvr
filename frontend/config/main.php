<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language'=>'zh-CN',
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
            'errorAction' => 'site/error',
        ],
        'i18n' => [
            'translations' => [                                 //使用语言包    设置为common.php文件
                'common' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    //'basePath' => '/messages',                    //默认调用/messages目录下的文件
                    'fileMap' => [
                        'common' => 'common.php',
                    ],
                ],
            ],
        ],
        'urlManager' => [                                       //添加url美化   需要.htaccess配合
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'suffix' => '.html',                                //url添加后缀名
            'rules'=>[
                'site/<article:\d+>' => 'site/article',
            ],
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];
