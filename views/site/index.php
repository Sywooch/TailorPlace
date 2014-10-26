<?php
/* @var $this yii\web\View */

use app\assets\AppAsset;
$this->title = 'Tailor place';
$this->registerCssFile('@web/css/index.css', [
    'depends' => [AppAsset::className()]
]);
?>


