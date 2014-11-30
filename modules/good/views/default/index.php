<?php
/**
 * Страница товара
 * @var yii\web\View $this
 */

use app\assets\AppAsset;

$this->registerCssFile('@web/css/good.css', [
    'depends' => [AppAsset::className()]
]);
?>
<main>
    <h2>Юбка Колибри из хлопка разноцветная с цветами и птицами</h2>
    <div id="photo-col">
        <img src="/photos/good/1/2.jpg" width="378" height="378" id="main-photo">
        <div class="thumbnails">
            <div>
                <img src="/photos/good/1/2_thumbnail.jpg" width="88" height="88">
            </div><div>
                <img src="/photos/good/1/2_thumbnail.jpg" width="88" height="88">
            </div><div class="active">
                <img src="/photos/good/1/2_thumbnail.jpg" width="88" height="88">
            </div><div>
                <img src="/photos/good/1/2_thumbnail.jpg" width="88" height="88">
            </div><div>
                <img src="/photos/good/1/2_thumbnail.jpg" width="88" height="88">
            </div>
        </div>
    </div>
    <div id="main-info">
        <h3 id="price-label">Цена:</h3>
        <div>
            <div id="price">
                <span>333 900</span> <span>руб.</span>
            </div>
            <div id="order-block">
                <div class="button yellow" id="to-order">
                    <div class="low-layer"></div>
                    <a data-type="button" class="icon-line"><i class="icon rouble-white"></i><span>Заказать</span></a>
                </div>
                <span class="icon-line" id="to-basket"><i class="icon basket-gold"></i><span class="dashed-underline">В корзину</span></span>
            </div>
        </div>
        <div class="additional-params">
            <ul>
                <li><span>Срок изготовления:</span> 3 недели</li>
                <li><span>Готовых экземпляров:</span> 4 шт.</li>
            </ul>
        </div>
        <div id="studio-block">
            <div class="name">
                <div class="icon-circle atelier"><i></i></div><span><a href="">Авторское ателье Людмилы Гордиенко</a></span>
            </div>
            <div class="city italic">Россия, Санкт-Петербург</div>
            <div id="rating" class="icon-line">
                <i class="green-star"></i> <span>Репутация</span> <span>100%</span>
            </div>
            <div id="order-count" class="icon-line">
                <i class="green-star"></i> <span>Выполнено заказов</span> <span>100%</span>
            </div>
            <div class="button">
                <div class="low-layer"></div>
                <a data-type="button" class="icon-line"><i class="icon rouble-gold"></i><span>Написать мастеру</span></a>
            </div>
        </div>
        <h3 class="description-label">Описание</h3>
        <p id="good-description">
            Юбка-солнце. Посадка на талии. Длина ок. 65 см. Юбка выкроена без шва, на всю ширину ткани. Пояс шириной ок. 6 см, из плотного трикотажного полотна вязанного резинкой (рибаны), продублирован резинкой эластичной. Легко одевается без всяких молний))

            По желанию можно любую длину. В зависимости от длины юбки и обхвата талии могут быть предусмотрены боковые швы на юбке.

            На фото - размер юбки 42-44.
            Стоимость указана вместе с данным на фото используемым материалом для данного размера. Окончательная стоимость зависит от расхода выбранного материала и его стоимости.
        </p>
        <div id="complain" class="icon-line">
            <i class="alert"></i> <span><a href="">Пожаловаться на товар</a></span>
        </div>
    </div>
    <aside id="additional-info">
        <h3 class="big-red-medium">Категории товара</h3>
        <ul>
            <li class="icon-line"><i class="icon women"></i> Женская одежда</li>
            <li class="icon-line"><i class="icon other"></i> Другое</li>
        </ul>
        <h3 class="big-red-medium">Доставка</h3>
        <ul>
            <li class="icon-line"><i class="icon women"></i> Женская одежда</li>
            <li class="icon-line"><i class="icon other"></i> Другое</li>
        </ul>
        <h3 class="big-red-medium">Оплата</h3>
        <ul>
            <li class="icon-line"><i class="icon women"></i> Женская одежда</li>
            <li class="icon-line"><i class="icon other"></i> Другое</li>
        </ul>
    </aside>
    <div class="clean"></div>
    <div id="comments">

    </div>
</main>