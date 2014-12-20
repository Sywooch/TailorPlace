<?php
/**
 * Страница товаров
 * @var yii\web\View $this
 */

use app\assets\AppAsset;

$this->registerCssFile('@web/css/goods.css', [
    'depends' => [AppAsset::className()]
]);
?>
<main>
    <aside id="personal-menu" class="float left">
        <section>
            <h3 class="big-red-medium">Категория продавца</h3>
            <ul>
                <li class="icon-line">
                    <div class="icon-circle rouble small"><i></i></div>
                    <a href="" class="dashed-underline">Все</a>
                </li>
                <li class="icon-line">
                    <div class="icon-circle atelier small"><i></i></div>
                    <a href="" class="dashed-underline">Ателье</a>
                </li>
                <li class="icon-line">
                    <div class="icon-circle store small"><i></i></div>
                    <span href="" class="red">Магазин</span>
                </li>
            </ul>
        </section>

        <!-- TODO слайдер добавить и запрограммировать уже после запуска сайта, ибо может быть сложно рассчитывать максимальную цену при уже выбранных категориях -->
        <section>
            <h3 class="big-red-medium">Диапазон цен</h3>
            <div class="price-inputs">
                <label for="low-price-limit">От</label>
                <input type="text" id="low-price-limit" class="form-control">
                <label for="high-price-limit">до</label>
                <input type="text" id="high-price-limit" class="form-control">
            </div>
            <div id="price-slider">
                <div class="line">
                    <div class="left-control"></div>
                    <div class="right-control"></div>
                </div>
                <div class="limits">
                    <span class="left">0</span>
                    <span class="right">10 000 (max)</span>
                </div>
            </div>
        </section>
    </aside>
    <div class="float right">
        asd
    </div>
</main>