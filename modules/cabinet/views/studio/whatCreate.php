<?php

use yii\helpers\Url;
use app\assets\AppAsset;

$this->registerCssFile('@web/css/cabinet-what-create.css', [
    'depends' => [AppAsset::className()]
]);

?>

<main>
    <h2 class="darker">Что вы хотите зарегистрировать?</h2>
    <section class="atelier-section">
        <div class="flag">
            <h3>Ателье</h3>
            <div></div>
        </div>
        <div class="icon-line">
            <div class="icon-circle atelier"><i></i></div>
            <p>Создав ателье, вы сможете размещать услуги по пошиву одежды</p>
        </div>
        <a href="<?= Url::toRoute('studio/create-atelier/') ?>">Открыть ателье</a>
    </section>
    <section class="store-section">
        <div class="flag">
            <h3>Магазин</h3>
            <div></div>
        </div>
        <div class="icon-line">
            <div class="icon-circle store"><i></i></div>
            <p>Создав магазин, вы сможете размещать предложения продажи материалов и комплектующих для шитья</p>
        </div>
        <a href="<?= Url::toRoute('studio/create-store/') ?>">Открыть магазин</a>
    </section>
</main>