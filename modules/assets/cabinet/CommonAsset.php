<?php

namespace app\modules\assets\cabinet;

use yii\web\AssetBundle;

/**
 * Class CabinetCommonAsset
 * Общие стили для персонального кабинета
 * @package app\modules\assets\cabinet
 */
class CommonAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/cabinet-common.css',
    ];
    public $js = [
    ];
    public $depends = [
        'app\assets\AppAsset',
    ];
}
