<?php
use \kartik\datecontrol\Module;

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru-RU',
    'layout' => 'main',
    'name' => 'СК "Талнах"',
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
            'layout'=>'main',
            // 'layout'=>'admin',
            // 'layoutPath'=>'@app/themes/adminLTE/layouts',
        ],
        'yii2images' => [
            'class' => 'rico\yii2images\Module',
            //be sure, that permissions ok 
            //if you cant avoid permission errors you have to create "images" folder in web root manually and set 777 permissions
            'imagesStorePath' => 'images/news_item', //path to origin images
            'imagesCachePath' => 'images/news_item/cache', //path to resized copies
            'graphicsLibrary' => 'GD', //but really its better to use 'Imagick' 
            'placeHolderPath' => '@webroot/images/no_image.jpg', // if you want to get placeholder when image not exists, string will be processed by Yii::getAlias
        ],
        'components' => [
            'view' => [
                 'theme' => [
                     'pathMap' => [
                        '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
                     ],
                 ],
            ],
        ],
       'gridview' =>  [
            'class' => '\kartik\grid\Module'
            // enter optional module parameters below - only if you need to  
            // use your own export download action or custom translation 
            // message source
            // 'downloadAction' => 'gridview/export/download',
            // 'i18n' => []
        ]
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '0bd9389237aa73fcf4af3b6f314be58584506b3c',
            'baseUrl' => '',
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
        'formatter' => [
            'dateFormat' => 'dd.MM.yyyy',
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
            'currencyCode' => 'EUR',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
            'class' => 'Swift_SmtpTransport',
            'host'=>'smtp.mail.ru',
            'username' => 'mr-15@mail.ru',
            'password' => 'nokia5530xpressmusic',
            'port' => '465',
            'encryption' => 'ssl',
            ],
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
                '' => 'site/index',
                'news/page=<page:\d+>' => 'news/index',
                'news/' => 'news/index',
                'news/<id:\d+>' => 'news/view',
                'event/<id:\d+>' => 'site/event',
                'contacts/' => 'site/contacts',
                'ask/' => 'site/ask',
                'questionary/' => 'site/questionary',
                'about/vacancies/'=>'vacancy/index',
                'about/vacancies/<id:\d+>'=>'vacancy/view',
                'login' => 'site/login',
                'logout' => 'site/logout',
                'admin' => 'admin/',
                'calendar/year=<yr:\d+>' => 'calendar/view',
                'calendar/<yr:\d+>/<mn:[\w+-]*\w+>' => 'calendar/index',
                'calendar/<yr:\d+>' => 'calendar/index',

                'calendar' => 'calendar/index',
//                'menu/page=<page:\d+>/size=<pageSize:\d+>/' => 'menu/index',

                'admin/<controller>/<action>' => 'admin/<controller>/<action>',

                'news_item/<id:\d+>' => 'news_item/view',
                'news_item/' => 'news_item/index',
                'images/' => 'yii2images/images/image-by-item-and-alias',


                '<grf:[\w+-]*\w+>/<parent_alias:[\w+-]*\w+>/contacts' => 'page/contacts',

                '<grf:[\w+-]*\w+>/<parent_alias:[\w+-]*\w+>/<alias:[\w+-]*\w+>' => 'page/index',
                '<parent_alias:[\w+-]*\w+>/<alias:[\w+-]*\w+>' => 'page/index',
                '<alias:[\w+-]*\w+>' => 'page/index',

            ],
        ],
        
    ],
    'controllerMap' => [
        'elfinder' => [
            'class' => 'mihaildev\elfinder\PathController',
            'access' => ['@'],
            'root' => [
                'baseUrl'=>'/web',
                // 'basePath'=>'@webroot',            
                'path' => 'files',
                'name' => 'Files'
            ],
            // 'watermark' => [
            //             'source'         => __DIR__.'/logo.png', // Path to Water mark image
            //              'marginRight'    => 5,          // Margin right pixel
            //              'marginBottom'   => 5,          // Margin bottom pixel
            //              'quality'        => 95,         // JPEG image save quality
            //              'transparency'   => 70,         // Water mark image transparency ( other than PNG )
            //              'targetType'     => IMG_GIF|IMG_JPG|IMG_PNG|IMG_WBMP, // Target image formats ( bit-field )
            //              'targetMinPixel' => 200         // Target image minimum pixel size
            // ]
        ]
    ],    
    'params' => [
        'company_id'=>'1'
    ],
];

 if (YII_ENV_DEV) {
     // configuration adjustments for 'dev' environment
     $config['bootstrap'][] = 'debug';
     $config['modules']['debug'] = [
         'class' => 'yii\debug\Module',
     ];

     $config['bootstrap'][] = 'gii';
     $config['modules']['gii'] = [
         'class' => 'yii\gii\Module',
         'generators' => [ //here
             'crud' => [ // generator name
             'class' => 'yii\gii\generators\crud\Generator', // generator class
             'templates' => [ //setting for out templates
             'custom' => '@app/vendor/yiisoft/yii2-gii/generators/crud/custom', // template name => path to template
             ]
             ]
         ],
     ];
 }

return $config;
