<?php
/**
 * Страница диалога.
 * @var yii\web\View $this
 */

use yii\helpers\Url;
use app\assets\AppAsset;

$this->registerCssFile('@web/css/dialog.css', [
    'depends' => [AppAsset::className()]
]);

?>

<h2>Диалог</h2>
<div class="sloping-line"></div>
<div id="dialog-wrapper">
    <p class="not-messages">С этим пользователем вы еще не общались</p>
<!--    <ul>-->
<!--        <li class="opponent">-->
<!--            <div class="user">-->
<!--                <div class="photo">-->
<!--                    <img src="/photos/studio/test-middle.jpg" width="48" height="48">-->
<!--                    <div class="icon-circle atelier small">-->
<!--                        <i></i>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="info">-->
<!--                    <div class="name"><a href="" class="size15 red">USerUserUSer Use</a></div>-->
<!--                    <time>28 марта 2014<br>в 08:59</time>-->
<!--                </div>-->
<!--            </div>-->
<!--            <p class="message">Большое спасибо за интерес к моей работе. Замечательная получилась коллекция.</p>-->
<!--        </li>-->
<!--        <li class="you">-->
<!--            <div class="you-wrapper">-->
<!--                <p class="message">Большое спасибо за интерес к моей работе. Замечательная получилась коллекция.</p>-->
<!--                <div class="user">-->
<!--                    <div class="photo">-->
<!--                        <img src="/photos/studio/test-middle.jpg" width="48" height="48">-->
<!--                        <div class="icon-circle person-green small">-->
<!--                            <i></i>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="info">-->
<!--                        <div class="name size15">Вы</div>-->
<!--                        <time>28 сентября 2014<br>в 08:59</time>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="clear"></div>-->
<!--        </li>-->
<!---->
<!--        <li class="opponent">-->
<!--            <div class="user">-->
<!--                <div class="photo">-->
<!--                    <img src="/photos/studio/test-middle.jpg" width="48" height="48">-->
<!--                    <div class="icon-circle atelier small">-->
<!--                        <i></i>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="info">-->
<!--                    <div class="name"><a href="" class="size15 red">USerUserUSer Use</a></div>-->
<!--                    <time>28 марта 2014<br>в 08:59</time>-->
<!--                </div>-->
<!--            </div>-->
<!--            <p class="message">Большое спасибо за интерес к моей работе. ЗамБольшое спасибо за интерес к моей работе. ЗамБольшое спасибо за интерес к моей работе. ЗамБольшое спасибо за интерес к моей работе. ЗамБольшое спасибо за интерес к моей работе. Замечательная получилась коллекция.за интерес к моей работе. Замечательная получилась коллекция.за интерес к моей работе. Замечательная получилась коллекция.за интерес к моей работе. Замечательная получилась коллекция.за интерес к моей работе. Замечательная получилась коллекция.</p>-->
<!--        </li>-->
<!---->
<!--        <li class="you">-->
<!--            <div class="you-wrapper">-->
<!--                <p class="message">Спасибо</p>-->
<!--                <div class="user">-->
<!--                    <div class="photo">-->
<!--                        <img src="/photos/studio/test-middle.jpg" width="48" height="48">-->
<!--                        <div class="icon-circle person-green small">-->
<!--                            <i></i>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="info">-->
<!--                        <div class="name size15">Вы</div>-->
<!--                        <time>28 февраля 2014<br>в 08:59</time>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="clear"></div>-->
<!--        </li>-->
<!--        <li class="you">-->
<!--            <div class="you-wrapper">-->
<!--                <p class="message">Спасибо Спасибо Спасибо Спасибо Спасибо Спасибо Спасибо Спасибо Спасибо Спасибо Спасибо Спасибо Спасибо Спасибо Спасибо Спасибо Спасибо Спасибо Спасибо Спасибо Спасибо Спасибо Спасибо Спасибо </p>-->
<!--                <div class="user">-->
<!--                    <div class="photo">-->
<!--                        <img src="/photos/studio/test-middle.jpg" width="48" height="48">-->
<!--                        <div class="icon-circle person-green small">-->
<!--                            <i></i>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="info">-->
<!--                        <div class="name size15">Вы</div>-->
<!--                        <time>28 февраля 2014<br>в 08:59</time>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="clear"></div>-->
<!--        </li>-->
<!--    </ul>-->
</div>
<div class="sloping-line"></div>
<form>
    <input type="hidden" name="opponentId" value="22">
    <textarea name="message"></textarea>
    <div class="button yellow" id="send-button">
        <div class="low-layer"></div>
        <button type="submit">Отправить</button>
    </div>
</form>