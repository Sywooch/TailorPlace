<?php
/**
 * Страница со списком активных заказов.
 * @var yii\web\View $this
 */

use yii\helpers\Url;
use app\assets\AppAsset;

$this->registerCssFile('@web/css/cabinet-orders.css', [
    'depends' => [AppAsset::className()]
]);

?>
<h2>Заказы</h2>
<menu class="atelier over-table"> <!-- Класс - тип студии. От этого зависит цвет подчеркивания -->
    <li>
        <span class="bold-underline bigger">У вас заказали</span>
    </li>
    <li>
        <a class="dashed-underline" href="">Вы заказали</a>
    </li>
</menu>

<div class="table-header">
    <div class="name-header">
        <div><a href="" class="dashed-underline">Номер заказа</a></div>
        <div></div>
    </div><div class="status-header">
        <div><a href="" class="dashed-underline">Статус</a></div>
        <div></div>
    </div><div class="price-header">
        <div><a href="" class="dashed-underline">Цена</a></div>
        <div></div>
    </div><div class="date-header">
        <div><a href="" class="dashed-underline">Дата</a> <span class="caret top"></span></div>
        <div></div>
    </div>
</div>

<ul class="order-list">
    <li data-order-id="12">
        <div class="main-info">
            <div class="order-number">
                <p class="big-red">Заказ №126645</p>
                <div class="studio-name">
                    <div>
                        <div class="icon-circle store small">
                            <i></i>
                        </div>
                    </div>
                    <span>
                        <a class="italic" href="">Елена Кучерявенко</a>
                    </span>
                </div>
            </div>
            <div class="photo-wrapper">
                <!-- TODO сделать миниатюры фотографий (куча файлов - плохо, лучше программно генерировать картинку) -->
            </div><div class="statis-box">
                <div class="status wait">
                    В ожидании
                </div>
                <div class="icon-line">
                    <i class="icon delete-red"></i><span class="dashed-underline">Отклонить заказ</span>
                </div>
                <div class="icon-line">
                    <i class="icon edit"></i><span class="dashed-underline">Изменить статус</span>
                </div>
            </div><div class="price-box">
                <span class="price-big">103 210</span> <span>руб.</span>
            </div><div class="date-box">20.08.2014</div>
        </div>
        <div class="sub-info">
            <div class="delivery icon-line">
                <i class="icon express-delivery"></i> <span>Курьерская доставка</span>
            </div>
            <div class="payment icon-line">
                <i class="icon by-cash-when-meeting"></i> <span>Наличными при встрече</span>
            </div>
            <div class="good-count icon-line">
                <i class="icon order"></i><span class="dashed-underline size15">Товаров в заказе</span> <span class="red size15">(2)</span>
            </div>
        </div>
    </li>
</ul>