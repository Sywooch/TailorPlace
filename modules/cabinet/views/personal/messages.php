<?php
/**
 * Страница сообщений.
 * @var yii\web\View $this
 */

use yii\helpers\Url;
use app\assets\AppAsset;

$this->registerCssFile('@web/css/messages.css', [
    'depends' => [AppAsset::className()]
]);

?>

<h2>Сообщения</h2>
<ul id="messages">
    <li>
        <div class="opponent">
            <div class="photo">
                <img src="/photos/studio/test-middle.jpg" width="48" height="48">
                <div class="icon-circle atelier small">
                    <i></i>
                </div>
            </div>
            <div class="info">
                <div class="name"><a href="" class="size15 red">USerUserUSer Use</a></div>
                <time>28 марта 2014<br>в 08:59</time>
            </div>
        </div>
        <a href="" class="message new">
            <p>Большое спасибо за интерес к моей работе. Замечательная получилась коллекция.</p>
        </a>
    </li>
    <li>
        <div class="opponent">
            <div class="photo">
                <img src="/photos/studio/test-middle.jpg" width="48" height="48">
                <div class="icon-circle atelier small">
                    <i></i>
                </div>
            </div>
            <div class="info">
                <div class="name"><a href="" class="size15 red">USerUserUSer Use</a></div>
                <time>28 марта 2014<br>в 08:59</time>
            </div>
        </div>
        <a href="" class="message">
            <p>Большое спасибо за интерес к моей работе. Замечательная получилась коллекция.</p>
        </a>
    </li>
    <li>
        <div class="opponent">
            <div class="photo">
                <img src="/photos/studio/test-middle.jpg" width="48" height="48">
                <div class="icon-circle person-green small">
                    <i></i>
                </div>
            </div>
            <div class="info">
                <div class="name"><a href="" class="size15 red">USerUserUSer Use</a></div>
                <time>28 марта 2014<br>в 08:59</time>
            </div>
        </div>
        <a href="" class="message">
            <p>Большое спасибо за интерес к моей работе. Замечательная получилась коллекция.</p>
        </a>
    </li>
    <li>
        <div class="opponent">
            <div class="photo">
                <img src="/photos/studio/test-middle.jpg" width="48" height="48">
                <div class="icon-circle store small">
                    <i></i>
                </div>
            </div>
            <div class="info">
                <div class="name"><a href="" class="size15 red">USerUserUSer Use</a></div>
                <time>28 марта 2014<br>в 08:59</time>
            </div>
        </div>
        <a href="" class="message">
            <p>Большое спасибо за интерес к моей работе. Замечательная получилась коллекция.</p>
        </a>
    </li>
</ul>
<div class="pagination">
    <div class="dashed scissor-right"></div>
    <ul class="pages bigger">
        <li class="link active">1</li><li class="link"><a href="" class="bigger">2</a></li><li class="link"><a href="" class="bigger">3</a></li><li>...</li><li class="link"><a href="" class="bigger">9</a></li><li class="link"><a href="" class="bigger">11</a></li><li class="link"><a href="" class="bigger">12</a></li>
    </ul>
    <form method="get"class="page-selector">
        <div class="form-group">
            <label>Перейти <input type="text" name="page" class="form-control"></label>
            <div id="pagination-button" class="button yellow">
                <div class="low-layer"></div>
                <button type="submit">Ok</button>
            </div>
        </div>
    </form>
    <div class="show-word bigger">Показывать:</div>
    <ul class="count-on-page bigger darker">
        <li><a href="">15</a></li>
        <li><a href="">30</a></li>
        <li><a href="">60</a></li>
    </ul>
</div>