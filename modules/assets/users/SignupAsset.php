<?php

namespace app\modules\assets\users;

use yii\web\AssetBundle;

class SignupAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/signup.css',
    ];
    public $js = [
        'js/signup.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'app\assets\AppAsset',
    ];
}
