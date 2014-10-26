<?php
/* @var $this yii\web\View */

use app\assets\AppAsset;
$this->title = 'Tailor place';
$this->registerCssFile('@web/css/index.css', [
    'depends' => [AppAsset::className()]
]);
?>

<div id="about-site">
    <section class="atelier">
        <h2><span class="bold-underline">Для портных</span></h2>
        <figure>
            <div><div class="main-icon-sewing-machine"></div></div>
            <figcaption>Создание собственного ателье</figcaption>
        </figure><figure>
            <div><div class="main-icon-good"></div></div>
            <figcaption>Размещение товаров</figcaption>
        </figure><figure>
            <div><div class="main-icon-search"></div></div>
            <figcaption>Поиск клиентов</figcaption>
        </figure>
    </section><section class="store">
        <h2><span class="bold-underline">Для магазинов</span></h2>
        <figure>
            <div><div class="main-icon-material"></div></div>
            <figcaption>Продажа материалов портным</figcaption>
        </figure>
    </section><section class="user">
        <h2><span class="bold-underline">Для покупателей</span></h2>
        <figure>
            <div><div class="main-icon-scissor"></div></div>
            <figcaption>Поиск личного портного</figcaption>
        </figure><figure>
            <div><div class="main-icon-meter"></div></div>
            <figcaption>Заказ одежды по индивидуальным меркам</figcaption>
        </figure><figure>
            <div><div class="main-icon-face"></div></div>
            <figcaption>Наслаждение от неповторимой одежды</figcaption>
        </figure>
    </section>
</div>
<div class="dashed scissor-left"></div>