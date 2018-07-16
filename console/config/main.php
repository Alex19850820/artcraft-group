<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);
$frontend = require(__DIR__ . '/../../frontend/config/main.php');

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'console\controllers',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'controllerMap' => [
        'fixture' => [
            'class' => 'yii\console\controllers\FixtureController',
            'namespace' => 'common\fixtures',
          ],
        'sitemap' => [
	        'class' => 'demi\sitemap\SitemapController',
	        'modelsPath' => '@console/models/sitemap', // Sitemap-data models directory
	        'modelsNamespace' => 'console\models\sitemap', // Namespace in [[modelsPath]] files
	        'savePathAlias' => '@frontend/web', // Where would be placed the generated sitemap-files
	        'sitemapFileName' => 'sitemap.xml', // Name of main sitemap-file in [[savePathAlias]] directory
        ],
    ],
    'components' => [
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'urlManager' => $frontend['components']['urlManager'],
    ],
    'params' => $params,
];
