<?php
/**
 * Страница 404 ошибки
 * @var yii\web\View $this
 */

use app\assets\AppAsset;

$this->registerCssFile('@web/css/errors.css', [
    'depends' => [AppAsset::className()]
]);
?>
<main>
    <div class="error-block">
        <h2>Ошибка</h2>
        <div class="code">404</div>
        <div class="error-description">
            <p>Страница не найдена</p>
        </div>
    </div>
    <p class="description">Страница никогда не существовала, либо была удалена.</p>
</main>