<?php
/**
 * Страница 403 ошибки
 * @var yii\web\View $this
 * @var boolean $isGuest
 */

use app\assets\AppAsset;

$this->registerCssFile('@web/css/errors.css', [
    'depends' => [AppAsset::className()]
]);
?>
<main>
    <div class="error-block">
        <h2>Ошибка</h2>
        <div class="code">403</div>
        <div class="error-description">
            <p>Доступ запрещен</p>
        </div>
    </div>
    <?php if ($isGuest): ?>
    <p class="description">
        У вас недостаточно прав,
        <a href="/login/">войдите</a> или <a href="/signup/">зарегистрируйтесь</a>.
        Возможно это поможет.
    </p>
    <?php else: ?>
        <p class="description">
            У вас недостаточно прав для просмотра данной страницы.
        </p>
    <?php endif ?>
</main>