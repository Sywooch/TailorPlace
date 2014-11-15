<?php

namespace app\modules\assets\studio;

use yii\web\AssetBundle;

class CreateStudioAsset extends AssetBundle
{
    public $sourcePath = '@root/modules/assets/studio';
    public $css = [
        'css/createStudio.css'
    ];
    public $js = [
        'js/createStudio.js'
    ];
    public $depends = [
        'app\assets\AppAsset',
        'yii\jui\JuiAsset'
    ];
}
