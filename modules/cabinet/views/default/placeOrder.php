<?php
/**
 * Страница оформления заказов.
 * @var yii\web\View $this
 */

use yii\helpers\Url;
use app\assets\AppAsset;

$this->registerCssFile('@web/css/placeOrder.css', [
    'depends' => [AppAsset::className()]
]);

?>

<h2>Оформление заказа</h2>
<p class="page-help bigger italic">С каждым ателье и/или магазином у вас будет оформлен отдельный заказ.</p>

<div class="order">
    <div class="icon-circle atelier"><i></i></div><h3 class="order-studio">Заказ у <a href="" target="_blank" class="big-red-medium">Brasletiki-spb</a></h3>
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
<div class="sum-info">
    <p class="bigger italic">У Вас 2 заказа</p>
    <p class="sum-price">Общая сумма: <i class="icon rouble-gold"></i> <span class="price-bigger">9 630</span> руб.</p>
</div>

<div class="panel width-panel" id="contacts">
    <form>
        <input type="hidden" name="order-list">
        <div class="panel-header">
            <div class="icon-circle person"><i></i></div><h2>Контактная информация</h2>
        </div>
        <div class="panel-body">
            <ul>
                <li>
                    <div class="form-group">
                        <div class="left-col">
                            <label class="control-label" for="phone">Номер телефона</label>
                        </div>
                        <div class="center-col">
                            <input id="phone" class="form-control" type="text" name="phone">
                            <div class="help-block"></div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="form-group">
                        <div class="left-col">
                            <label class="control-label" for="index">Почтовый индекс</label>
                        </div>
                        <div class="center-col">
                            <input id="index" class="form-control" type="text" name="index">
                            <div class="help-block"></div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="form-group">
                        <div class="left-col">
                            <label class="control-label" for="address">Адрес доставки</label>
                        </div>
                        <div class="center-col">
                            <textarea id="address" class="form-control" name="address"></textarea>
                            <div class="help-block"></div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="panel-footer">
            <div class="button yellow" id="add-action">
                <div class="low-layer"></div>
                <button type="submit">Оформить заказы</button>
            </div>
        </div>
    </form>
</div>
<div>
    <a href="/cabinet/basket/">Вернуться в корзину</a>
</div>