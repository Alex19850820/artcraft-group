<?php
return [
    'bootstrap' => ['gii'],
    'modules' => [
        'gii' => 'yii\gii\Module',
    ],
	// fix console create url
    'urlManager' => [
	    'baseUrl' => 'http://artcraft-group.loc',
    ],
];
