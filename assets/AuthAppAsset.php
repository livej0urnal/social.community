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
        '/library/OverlayScrollbars-master/css/OverlayScrollbars.min.css',
        '/library/tiny-slider/dist/tiny-slider.css',
        '/library/choices.js/public/assets/styles/choices.min.css',
        '/library/glightbox-master/dist/css/glightbox.min.css',
        '/library/dropzone/dist/dropzone.css',
        '/library/flatpickr/dist/flatpickr.css',
        '/library/plyr/plyr.css',
        '/css/style-dark.css',
    ];
    public $js = [
        '/library/bootstrap/dist/js/bootstrap.bundle.min.js',
        '/library/tiny-slider/dist/tiny-slider.js',
        '/library/OverlayScrollbars-master/js/OverlayScrollbars.min.js',
        '/library/choices.js/public/assets/scripts/choices.min.js',
        '/library/glightbox-master/dist/js/glightbox.min.js',
        '/library/flatpickr/dist/flatpickr.min.js',
        '/library/plyr/plyr.js',
//        '/library/dropzone/dist/min/dropzone.min.js',
        '/js/functions.js',
    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap5\BootstrapAsset'
        'yii\web\JqueryAsset',
    ];
}