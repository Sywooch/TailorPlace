<?php
use Yii;
use yii\helpers\Url;

// var_dump(Yii::$app->request->get());
// exit();
?>
<h1><?= $studioType ?></h1>
<div class="over-table">
	<menu class="<?= $Studio->type ?>">
		<li>
			<?php if ($section != 'vitrine'): ?>
				<a href="<?= '/cabinet/studio/'  . 'vitrine/' . ($order ? $order . '/' : '') ?>">Витрина</a>
			<?php else: ?>
				<span class="bold-underline">Витрина</span>
			<?php endif ?>
		</li>
		<li>
			<?php if ($section != 'sale'): ?>
				<a href="<?= '/cabinet/studio/' . 'sale/' . ($order ? $order . '/' : '') ?>">Скидки</a>
			<?php else: ?>
				<span class="bold-underline">Скидки</span>
			<?php endif ?>
		</li>
		<li>
			<?php if ($section && $section != 'all'): ?>
				<a href="<?= '/cabinet/studio/' . ($order ? $order . '/' : '') ?>">Все товары</a>
			<?php else: ?>
				<span class="bold-underline">Все товары</span>
			<?php endif ?>
		</li>
	</menu>
	<div id="signup-button" class="button yellow">
		<div class="low-layer"></div>
		<a data-type="button" href="<?= Url::toRoute('add-good') ?>"><i class="icon icon-good-white"></i><span>Добавить товар</span></a>
	</div>
</div>
<div class="table-header">
	<div>
		<!-- TODO у первого дива сделать нижний отриц. margin, z-index больше, и полосатый bg -->
		<div><a href="">Название</a></div>
		<div></div>
	</div>
	<div>
		<div><a href="">Цена</a></div>
		<div></div>
	</div>
	<div>
		<div><a href="">Дата</a></div>
		<div></div>
	</div>
	<div>
		<div><i class="icon icon-price"></div>
		<div></div>
	</div>
	<div>
		<div><i class="icon icon-sale"></div>
		<div></div>
	</div>
</div>
<ul class="good-list">
	<li>
		<img>
		<div>
	</li>
</ul>