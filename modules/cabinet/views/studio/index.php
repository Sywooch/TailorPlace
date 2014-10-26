<?php
use Yii;
?>
<h1><?= $studioType ?></h1>
<div class="under-table">
	<menu class="store-menu">
		<li><a href="<?= Yii::$app->urlManager->createUrl(['', 'id' => 'about']); ?>">Витрина</a></li>
		<li><a>Скидки</a></li>
		<li><a class="active">Все товары</a></li>
	</menu>
</div>