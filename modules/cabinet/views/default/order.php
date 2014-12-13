<?php
/**
 * Страница заказа.
 * @var yii\web\View $this
 */

use yii\helpers\Url;
use app\assets\AppAsset;

$this->registerCssFile('@web/css/cabinet-order.css', [
    'depends' => [AppAsset::className()]
]);

?>

<h2>Заказ №356</h2>

<div class="order-header">
    <div class="icon-circle atelier"><i></i></div><h3 class="order-studio">Заказ у <a href="" target="_blank" class="big-red-medium">Brasletiki-spb</a></h3>
    <div class="statis-box">
        <div class="order-status wait"><span>В ожидании</span></div>
        <div class="icon-line">
            <i class="icon edit"></i><span class="dashed-underline">Изменить статус</span>
        </div>
        <div class="icon-line">
            <i class="icon delete-red"></i><span class="dashed-underline">Отклонить заказ</span>
        </div>
    </div>
</div>
<div class="panel width-panel">
    <div class="panel-body">
        <ul class="good-list">
            <li>
                <a href="" target="_blank" class="img-link"><img src="/photos/good/1/1_small.jpeg" width="48" height="48"></a><div class="name-box">
                    <a href="" target="_blank" class="bigger">Платье “Осень, Зима, Весна”</a>
                </div><div class="price-box">
                    <span class="price-normal">3 210</span> руб.
                </div><div class="counter">
                    <span>Кол-во:</span> <span class="price-normal">3 999</span>
                </div><div class="end-price">
                    <span class="price-bigger">3 210</span> руб.
            </li>
            <li>
                <a href="" target="_blank" class="img-link"><img src="/photos/good/1/1_small.jpeg" width="48" height="48"></a><div class="name-box">
                    <a href="" target="_blank" class="bigger">Платье “Осень, Зима, Весна”</a>
                </div><div class="price-box">
                    <span class="price-normal">3 210</span> руб.
                </div><div class="counter">
                    <span>Кол-во:</span> <span class="price-normal">3 999</span>
                </div><div class="end-price">
                    <span class="price-bigger">3 210</span> руб.
            </li>
        </ul>
    </div>
    <div class="panel-footer">
        <div class="footer-info">
            <div>
                <div class="delivery icon-line">
                    <i class="icon express-delivery"></i> <span>Курьерская доставка</span>
                </div>
                <div class="payment icon-line">
                    <i class="icon by-cash-when-meeting"></i> <span>Наличными при встрече</span>
                </div>
            </div><div class="button-wrapper">
                <div class="button comment-button">
                    <div class="low-layer"></div>
                    <button>Добавить комментарий</button>
                </div>
            </div><div class="order-summary">
                <span>Итого:</span> <i class="icon rouble-gold"></i> <span class="price-normal">3 210</span> <span>руб.</span>
            </div>
        </div>
    </div>
</div>

<div class="dashed scissor-left"></div>

<div class="icon-circle comment"><i></i></div><h3 class="comment-header">Комментарий</h3>

<p class="panel width-panel">
    Фетровые шляпы, летние легкие шляпы, шляпы цилиндры, шляпы котелки, шляпки таблетки с вуалью, коктейльные шляпки – вуалетки, широкополые пляжные шляпы, свадебные - торжественные шляпки, шляпы на каждый день...
</p>

<div class="icon-circle person"><i></i></div><h3 class="contact-header">Контактная информация</h3>

<ul class="contact-info">
    <li>
        <div class="left-col">Номер телефона</div>
        <div class="right-col">+7 988 777 6655</div>
    </li>
    <li>
        <div class="left-col">Почтовый индекс</div>
        <div class="right-col">123 000</div>
    </li>
    <li>
        <div class="left-col">Адрес доставки</div>
        <div class="right-col">Москва, ул.Чертановская, 32</div>
    </li>
</ul>