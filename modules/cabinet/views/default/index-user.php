<?php

use yii\helpers\Url;
use app\widgets\panelWidgets\PersonalIndexStudioOrders;
use app\widgets\panelWidgets\PersonalIndexStudioRating;
use app\widgets\panelWidgets\Purse;
use app\assets\AppAsset;

$this->registerCssFile('@web/css/cabinet-index.css', [
    'depends' => [AppAsset::className()]
]);


?>
<div class="first-line">
    <div class="inline-vidget">
        <h4><a href="" class="big-red-medium">Заказы</a></h4>
        <?= PersonalIndexStudioOrders::widget() ?>
    </div>
    <div class="inline-vidget">
        <h4><a href="" class="big-red-medium">Репутация</a></h4>
            <?= PersonalIndexStudioRating::widget() ?>
    </div>
    <div class="inline-vidget">
        <h4><a href="" class="big-red-medium">Кошелек</a></h4>
        <?= Purse::widget() ?>
    </div>
</div>
<div class="second-line">

</div>