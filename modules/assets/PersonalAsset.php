<?php

namespace app\modules\assets;

use yii\web\AssetBundle;

class PersonalAsset extends AssetBundle
{
    public $sourcePath = '@root/modules/assets/personal';
    public $js = [
        'js/callPersinalForms.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
