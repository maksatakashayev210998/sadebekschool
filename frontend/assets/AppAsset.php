<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/main.css?v=1.2',
        'css/mobmenu.css',
        'css/plyr.css',
    ];
    public $js = [
        'js/jquery.maskedinput.min.js',
        'js/main.js',
        'js/plyr.js',
        'js/plyr2.js',
        'js/plyr.polyfilled.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
