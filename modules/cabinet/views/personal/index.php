<?php

use app\assets\AppAsset;
use yii\helpers\Html;

$this->registerCssFile('@web/css/cabinet-personal-index.css', [
    'depends' => [AppAsset::className()]
]);

?>

<h2>Персональные данные</h2>
<?= $userView ?>
<?= $studioView ?>
