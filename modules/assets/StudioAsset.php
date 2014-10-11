<?php

namespace app\modules\assets;

use yii\web\AssetBundle;

class StudioAsset extends AssetBundle
{
    public $sourcePath = '@root/modules/assets/studio';
    public $js = [
        'js/createStudio.js'
    ];
    public $depends = [
        'yii\jui\JuiAsset'
    ];
}
