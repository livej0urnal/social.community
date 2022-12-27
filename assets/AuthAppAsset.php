<?php

namespace app\assets;

use \yii\web\AssetBundle;

class AuthAppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/library/font-awesome/css/all.min.css',
        '/library/bootstrap-icons/bootstrap-icons.css',
        '/css/style-dark.css',
    ];
    public $js = [
        '/library/bootstrap/dist/js/bootstrap.bundle.min.js',
        '/library/pswmeter/pswmeter.min.js',
        '/js/functions.js',
    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap5\BootstrapAsset'
        'yii\web\JqueryAsset',
    ];
}