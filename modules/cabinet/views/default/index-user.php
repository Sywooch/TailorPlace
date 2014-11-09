<?php

use yii\helpers\Url;
use app\widgets\panelWidgets\PersonalIndexUserOrders;
use app\widgets\panelWidgets\PersonalIndexUserBasket;
use app\widgets\panelWidgets\PersonalIndexUserRating;
use app\assets\AppAsset;

$this->registerCssFile('@web/css/cabinet-index.css', [
    'depends' => [AppAsset::className()]
]);
?>
<div class="float">
    <h4><a href="" class="big-red-medium">Заказы</a></h4>
    <?= PersonalIndexUserOrders::widget() ?>
    <h4><a href="" class="big-red-medium">Корзина</a></h4>
    <?= PersonalIndexUserBasket::widget() ?>
</div>
<div class="float">
    <div class="inline-vidget small-widget">
        <h4><a href="" class="big-red-medium">Репутация</a></h4>
        <?= PersonalIndexUserRating::widget() ?>
    </div>
    <div class="open-owner-studio">
        <p>
            Откройте свой собственный магазин или ателье
        </p>
        <div id="owner-studio-button" class="button">
            <div class="low-layer"></div>
            <a href="<?= Url::toRoute('studio/what-create/') ?>" data-type="button">
                <span>Открыть</span>
            </a>
        </div>
    </div>
</div>