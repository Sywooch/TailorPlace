<?php

use app\modules\assets\cabinet\CommonAsset;

/* @var $this \yii\web\View */
/* @var $content string */

CommonAsset::register($this);

$this->beginContent('@app/views/layouts/main-layout.php');
?>
<aside id="personal-menu" class="float left">
    <div class="person-info">
<!--        <img src="/photos/studio/test.jpg">-->
        <div>
            <div>
                <div class="icon-circle store" data-toggle="tooltip" data-placement="right" title="Магазин"><i></i></div>
                <p class="name darker">
                    Ludalang
                </p>
            </div>
            <p class="city darker">Санкт-Перетбург</p>
        </div>
    </div>
    <div class="menu">
        <p class="big-red-medium">Магазин</p>
        <menu>
            <li class="icon-line"><i class="icon store"></i>Мой магазин</li>
            <li class="icon-line"><i class="icon statistic"></i>Статистика</li>
            <li class="icon-line"><i class="icon order"></i>Заказы</li>
            <li class="icon-line"><i class="icon archive"></i>Архив заказов</li>
            <li class="icon-line"><i class="icon arrow"></i>Дополнительные услуги</li>
        </menu>
        <p class="big-red-medium">Аккаунт</p>
        <menu>
            <li class="icon-line"><i class="icon person"></i>Персональные данные</li>
            <li class="icon-line"><i class="icon basket"></i>Корзина</li>
            <li class="icon-line"><i class="icon message"></i>Сообщения</li>
        </menu>
    </div>

</aside>
<main class="float right">
    <?= $content ?>
</main>
<?php $this->endContent(); ?>
