<?php

use app\assets\AppAsset;
use yii\helpers\Html;

$this->registerCssFile('@web/css/cabinet-personal-index.css', [
    'depends' => [AppAsset::className()]
]);

?>

<h3>Персональные данные</h3>
<?= $userView ?>
<?= $studioView ?>
