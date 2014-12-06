<?php
/**
 * Страница корзины.
 * @var yii\web\View $this
 */

use yii\helpers\Url;
use app\assets\AppAsset;

$this->registerCssFile('@web/css/basket.css', [
    'depends' => [AppAsset::className()]
]);

?>
<h2>Корзина</h2>
<div class="sum-info">
    <p class="bigger italic">У Вас 2 заказа</p>
    <p class="sum-price">Общая сумма: <i class="icon rouble-gold"></i> <span class="price-bigger">9 630</span> руб.</p>
    <div class="button yellow place-all-order">
        <div class="low-layer"></div>
        <a href="<?= Url::toRoute('place-order/') ?>" data-type="button" class="icon-line"><i class="icon order-white"></i>Оформить все заказы</a>
    </div>
</div>
<div class="dashed scissor-left"></div>
<div class="order">
    <div class="icon-circle atelier"><i></i></div><h3 class="order-studio">Заказ у <a href="" target="_blank" class="big-red-medium">Brasletiki-spb</a></h3>
    <div class="panel width-panel">
        <div class="panel-header">
            <ul class="good-list">
                <li>
                    <a href="" target="_blank" class="img-link"><img src="/photos/good/1/1_small.jpeg" width="48" height="48"></a><div class="name-box">
                        <span><a href="" target="_blank" class="bigger">Платье “Осень, Зима, Весна”</a></span>
                        <div class="icon-line"><i class="icon delete-red"></i><span class="dashed-underline">Удалить</span></div>
                        <div class="shadow"></div>
                    </div><div class="price-box">
                        <span class="price-normal">333 210</span> руб.
                    </div><div class="counter">
                        <button class="minusButton"></button><input class="form-control" type="text" name="count"><button class="plusButton"></button>
                    </div><div class="end-price">
                        <span class="price-bigger">333 210</span> руб.
                    </div>
                </li>
                <li>
                    <a href="" target="_blank" class="img-link"><img src="/photos/good/1/1_small.jpeg" width="48" height="48"></a><div class="name-box">
                        <span><a href="" target="_blank" class="bigger">Платье wer eee “Осень, Зима, Весна”</a></span>
                        <div class="icon-line"><i class="icon delete-red"></i><span class="dashed-underline">Удалить</span></div>
                        <div class="shadow"></div>
                    </div><div class="price-box">
                        <span class="price-normal">3 210</span> руб.
                    </div><div class="counter">
                        <button class="minusButton"></button><input class="form-control" type="text" name="count"><button class="plusButton"></button>
                    </div><div class="end-price">
                        <span class="price-bigger">3 210</span> руб.
                    </div>
                </li>
            </ul>
        </div>
        <div class="panel-body">
            <div class="delivery-type">
                <span class="bigger">Доставка</span><div class="select">
                    <select>
                        <option>При личной встрече</option>
                        <option>Курьерская доставка</option>
                        <option>Доставка почтой</option>
                    </select>
                    <div class="select-button"><span class="caret"></span></div>
                </div>
            </div><div class="payment-type">
                <span class="bigger">Оплата</span><div class="select">
                    <select>
                        <option>Наличными при встрече</option>
                        <option>Почтовый перевод</option>
                        <option>Яндекс-деньги</option>
                    </select>
                    <div class="select-button"><span class="caret"></span></div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <div class="icon-line delete-order"><i class="icon delete-red"></i><span class="dashed-underline">Удалить заказ</span></div><div class="button-wrapper">
                <div class="button place-order">
                    <div class="low-layer"></div>
                    <a href="<?= Url::toRoute('place-order/') ?>" data-type="button" class="icon-line"><i class="icon order-white"></i>Оформить</a>
                </div>
            </div><div class="order-summary">
                <span>Итого:</span> <i class="icon rouble-gold"></i> <span class="price-normal">3 210</span> <span>руб.</span>
            </div>
        </div>
    </div>
</div>

<div class="order">
    <div class="icon-circle store"><i></i></div><h3 class="order-studio">Заказ у <a href="" target="_blank" class="big-red-medium">Brasletiki-spb</a></h3>
    <div class="panel width-panel">
        <div class="panel-header">
            <ul class="good-list">
                <li>
                    <div class="main-info">
                        <a href="" target="_blank" class="img-link"><img src="/photos/good/1/1_small.jpeg" width="48" height="48"></a><div class="name-box">
                            <span><a href="" target="_blank" class="bigger">Платье “Осень, Зима, Весна”</a></span>
                            <div class="icon-line"><i class="icon delete-red"></i><span class="dashed-underline">Удалить</span></div>
                            <div class="shadow"></div>
                        </div><div class="price-box">
                            <span class="price-normal">3 210</span> руб.
                        </div><div class="counter">
                            <button class="minusButton"></button><input class="form-control" type="text" name="count"><button class="plusButton"></button>
                        </div><div class="end-price">
                            <span class="price-bigger">3 210</span> руб.
                        </div>
                    </div>
                </li>
                <li>
                    <div class="main-info">
                        <a href="" target="_blank" class="img-link"><img src="/photos/good/1/1_small.jpeg" width="48" height="48"></a><div class="name-box">
                            <span><a href="" target="_blank" class="bigger">Платье wer eee “Осень, Зима, Весна”</a></span>
                            <div class="icon-line"><i class="icon delete-red"></i><span class="dashed-underline">Удалить</span></div>
                            <div class="shadow"></div>
                        </div><div class="price-box">
                            <span class="price-normal">3 210</span> руб.
                        </div><div class="counter">
                            <button class="minusButton"></button><input class="form-control" type="text" name="count"><button class="plusButton"></button>
                        </div><div class="end-price">
                            <span class="price-bigger">3 210</span> руб.
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="panel-body">
            <div class="delivery-type">
                <span class="bigger">Доставка</span>
                <div class="select">
                    <select>
                        <option>При личной встрече</option>
                        <option>Курьерская доставка</option>
                        <option>Доставка почтой</option>
                    </select>
                    <div class="select-button"><span class="caret"></span></div>
                </div>
            </div>
            <div class="payment-type">
                <span class="bigger">Оплата</span>
                <div class="select">
                    <select>
                        <option>Наличными при встрече</option>
                        <option>Почтовый перевод</option>
                        <option>Яндекс-деньги</option>
                    </select>
                    <div class="select-button"><span class="caret"></span></div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <div class="icon-line delete-order"><i class="icon delete-red"></i><span class="dashed-underline">Удалить заказ</span></div><div class="button-wrapper">
                <div class="button place-order">
                    <div class="low-layer"></div>
                    <a href="<?= Url::toRoute('place-order/') ?>" data-type="button" class="icon-line"><i class="icon order-white"></i>Оформить</a>
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
    <div class="button yellow place-all-order">
        <div class="low-layer"></div>
        <a href="<?= Url::toRoute('place-order/') ?>" data-type="button" class="icon-line"><i class="icon order-white"></i>Оформить все заказы</a>
    </div>
</div>