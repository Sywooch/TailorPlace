<?php
/**
 * Страница диалога.
 * @var yii\web\View $this
 */

use yii\helpers\Url;
use app\assets\AppAsset;

$this->registerCssFile('@web/css/dialog.css', [
    'depends' => [AppAsset::className()]
]);

?>
qwe