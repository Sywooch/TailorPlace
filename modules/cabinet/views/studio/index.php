<?php
/**
 * @var $Studio app\modules\studio\models\Studio
 * @var $section string|boolean
 * @var $order string|boolean
 */

use yii\helpers\Url;
use app\assets\AppAsset;

$this->registerCssFile('@web/css/cabinet-studio-index.css', [
    'depends' => [AppAsset::className()]
]);
$this->registerJsFile('@web/js/cabinet-studio-index.js', [
    'depends' => [AppAsset::className()]
]);

// var_dump(Yii::$app->request->get());
// exit();
?>
<h3><?= $studioType ?></h3>
<div class="over-table">
	<menu class="<?= $Studio->type ?>">
		<li>
			<?php if ($section != 'vitrine'): ?>
				<a class="dashed-underline" href="<?= '/cabinet/studio/'  . 'vitrine/' . ($order ? $order . '/' : '') ?>">Витрина</a>
			<?php else: ?>
				<span class="bold-underline bigger">Витрина</span>
			<?php endif ?>
		</li>
        <!-- TODO скидки добавить -->
<!--		<li>-->
<!--			--><?php //if ($section != 'sale'): ?>
<!--				<a href="--><?//= '/cabinet/studio/' . 'sale/' . ($order ? $order . '/' : '') ?><!--">Скидки</a>-->
<!--			--><?php //else: ?>
<!--				<span class="bold-underline">Скидки</span>-->
<!--			--><?php //endif ?>
<!--		</li>-->
		<li>
			<?php if ($section && $section != 'all'): ?>
				<a class="dashed-underline" href="<?= '/cabinet/studio/' . ($order ? $order . '/' : '') ?>">Все товары</a>
			<?php else: ?>
				<span class="bold-underline bigger">Все товары</span>
			<?php endif ?>
		</li>
	</menu>
    <div class="add-button-wrapper">
        <div id="add-good-button" class="button yellow">
            <div class="low-layer"></div>
            <a data-type="button" href="<?= Url::toRoute('add-good') ?>" class="icon-line"><i class="icon good-white"></i><span>Добавить товар</span></a>
        </div>
    </div>
</div>
<div class="table-header">
	<div class="name">
		<!-- TODO у первого дива сделать нижний отриц. margin, z-index больше, и полосатый bg -->
		<div><a href="" class="dashed-underline">Название</a></div>
		<div></div>
	</div><div class="price">
		<div><a href="" class="dashed-underline">Цена</a></div>
		<div></div>
	</div><div class="date">
		<div><a href="" class="dashed-underline">Дата</a> <span class="caret top"></span></div>
		<div></div>
	</div>
<!-- TODO добавить кол-во продаж -->
<!--	<div>-->
<!--		<div><i class="icon icon-price"></div>-->
<!--		<div></div>-->
<!--	</div>-->
<!-- TODO скидки добавить -->
<!--	<div>-->
<!--		<div><i class="icon icon-sale"></div>-->
<!--		<div></div>-->
<!--	</div>-->
</div>
<ul class="good-list">
	<li data-good-id="12">
        <div class="main-info">
            <a href="" class="img-link"><img src="/photos/good/1/1_small.jpeg" width="48" height="48"></a>
            <div class="name-box">
                <span><a href="" class="bigger">Платье “Осень, Зима, Весна”</a></span>
                <div class="vitrine-button on-vitrine">На витрине</div>
            </div><div class="price-box">
                <span class="price-normal">3 210</span> <span>руб.</span>
            </div><div class="date-box">20.08.2014</div>
        </div>
        <div class="sub-info">
            <ul>
                <li class="icon-line"><i class="icon women"></i><span>Женская одежда</span></li>
                <li class="icon-line"><i class="icon the-dress"></i><span>Платье</span></li>
            </ul>
            <div class="redact">
                <span class="icon-line"><i class="icon edit"></i><a href="" class="dashed-underline">Редактировать</a></span>
                <span class="icon-line"><i class="icon delete-red"></i><a href="" class="dashed-underline">Удалить</a></span>
            </div>
        </div>
	</li>
	<li data-good-id="12">
        <div class="main-info">
            <a href="" class="img-link"><img src="/photos/good/1/1_small.jpeg" width="48" height="48"></a>
            <div class="name-box">
                <span><a href="" class="bigger">Платье “Осень, Зима, Весна”</a></span>
                <div class="vitrine-button to-vitrine">На витрину</div>
            </div><div class="price-box">
                <span class="price-normal">3 210</span> <span>руб.</span>
            </div><div class="date-box">20.08.2014</div>
        </div>
        <div class="sub-info">
            <ul>
                <li class="icon-line"><i class="icon women"></i><span>Женская одежда</span></li>
                <li class="icon-line"><i class="icon the-dress"></i><span>Платье</span></li>
            </ul>
            <div class="redact">
                <span class="icon-line"><i class="icon edit"></i><a href="" class="dashed-underline">Редактировать</a></span>
                <span class="icon-line"><i class="icon delete-red"></i><a href="" class="dashed-underline">Удалить</a></span>
            </div>
        </div>
	</li>
	<li data-good-id="12">
        <div class="main-info">
            <a href="" class="img-link"><img src="/photos/good/1/1_small.jpeg" width="48" height="48"></a>
            <div class="name-box">
                <span><a href="" class="bigger">Платье “Осень, Зима, Весна”</a></span>
                <div class="vitrine-button on-vitrine">На витрине</div>
            </div><div class="price-box">
                <span class="price-normal">3 210</span> <span>руб.</span>
            </div><div class="date-box">20.08.2014</div>
        </div>
        <div class="sub-info">
            <ul>
                <li class="icon-line"><i class="icon women"></i><span>Женская одежда</span></li>
                <li class="icon-line"><i class="icon the-dress"></i><span>Платье</span></li>
            </ul>
            <div class="redact">
                <span class="icon-line"><i class="icon edit"></i><a href="" class="dashed-underline">Редактировать</a></span>
                <span class="icon-line"><i class="icon delete-red"></i><a href="" class="dashed-underline">Удалить</a></span>
            </div>
        </div>
	</li>
	<li data-good-id="12">
        <div class="main-info">
            <a href="" class="img-link"><img src="/photos/good/1/1_small.jpeg" width="48" height="48"></a>
            <div class="name-box">
                <span><a href="" class="bigger">Платье “Осень, Зима, Весна”</a></span>
                <div class="vitrine-button on-vitrine">На витрине</div>
            </div><div class="price-box">
                <span class="price-normal">3 210</span> <span>руб.</span>
            </div><div class="date-box">20.08.2014</div>
        </div>
        <div class="sub-info">
            <ul>
                <li class="icon-line"><i class="icon women"></i><span>Женская одежда</span></li>
                <li class="icon-line"><i class="icon the-dress"></i><span>Платье</span></li>
            </ul>
            <div class="redact">
                <span class="icon-line"><i class="icon edit"></i><a href="" class="dashed-underline">Редактировать</a></span>
                <span class="icon-line"><i class="icon delete-red"></i><a href="" class="dashed-underline">Удалить</a></span>
            </div>
        </div>
	</li>
	<li data-good-id="12">
        <div class="main-info">
            <a href="" class="img-link"><img src="/photos/good/1/1_small.jpeg" width="48" height="48"></a>
            <div class="name-box">
                <span><a href="" class="bigger">Платье “Осень, Зима, Весна”</a></span>
                <div class="vitrine-button on-vitrine">На витрине</div>
            </div><div class="price-box">
                <span class="price-normal">3 210</span> <span>руб.</span>
            </div><div class="date-box">20.08.2014</div>
        </div>
        <div class="sub-info">
            <ul>
                <li class="icon-line"><i class="icon women"></i><span>Женская одежда</span></li>
                <li class="icon-line"><i class="icon the-dress"></i><span>Платье</span></li>
            </ul>
            <div class="redact">
                <span class="icon-line"><i class="icon edit"></i><a href="" class="dashed-underline">Редактировать</a></span>
                <span class="icon-line"><i class="icon delete-red"></i><a href="" class="dashed-underline">Удалить</a></span>
            </div>
        </div>
	</li>
</ul>
<div class="pagination">
    <div class="dashed scissor-right"></div>
    <ul class="pages">
        <li class="link">1</li>
        <li class="link">2</li>
        <li class="link">3</li>
        <li>...</li>
        <li class="link">9</li>
        <li class="link">11</li>
        <li class="link">12</li>
    </ul>
    <form method="get">
        <label>Перейти <input type="text" name="page"></label>
        <div id="add-good-button" class="button yellow">
            <div class="low-layer"></div>
            <button type="submit">Ok</button>
        </div>
    </form>
    <ul class="count-on-page">
        <li><a href="">15</a></li>
        <li><a href="">30</a></li>
        <li><a href="">60</a></li>
    </ul>
</div>