<?php
/**
 * Страница платных услуг.
 * @var yii\web\View $this
 */

use yii\helpers\Url;
use app\assets\AppAsset;

$this->registerCssFile('@web/css/paidServices.css', [
    'depends' => [AppAsset::className()]
]);

?>

<h2>Дополнительные услуги</h2>
<div id="services-wrapper">
    <div id="main-col">
        <p>
            Здесь представлены платные услуги по продвижению своего ателье/магазина и размещенных в нем товаров.
        </p>
        <ul>
            <li>
                <div class="icon-circle up"><i></i></div>
                <div class="service-body">
                    <h3><a href="">Продвижение ателье/магазина</a></h3>
                    <p>
                        При активации данной услуги ваше ателье (магазин) окажется на главной странице сайта.
                        Оно будет добавлено в карусель ателье/магазинов и пробудет там в течении определенного времени.
                    </p>
                </div>
            </li>
            <li>
                <div class="icon-circle good-green"><i></i></div>
                <div class="service-body">
                    <h3><a href="">Продвижение товаров</a></h3>
                    <p>
                        Используя данную услугу вы можете добавить товар в карусель
                    </p>
                </div>
            </li>
        </ul>
    </div>
    <div id="right-col">
        <div class="panel small-panel" id="purse">
            <div class="panel-body">
                <div class="header icon-line"><i class="icon rouble-light"></i><span>Баланс</span></div>
                <div class="big-digit">0</div>
            </div>
            <div class="panel-footer">
                <div class="header icon-line"><a href="/cabinet/">История платежей</a></div>
            </div>
        </div>
        <div class="button yellow" id="fill-up-button">
            <div class="low-layer"></div>
            <a href="" data-type="button" class="icon-line"><i class="icon rouble-white"></i>Пополнить</a>
        </div>
    </div>
</div>