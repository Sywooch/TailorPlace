<?php

use yii\helpers\Url;

?>

<h1>Что вы хотите зарегистрировать?</h1>
<div class="atelier">
	<h2>Ателье</h2>
	<p>
		Создав ателье, вы сможете размещать услуги по пошиву одежды
	</p>
	<a href="<?= Url::toRoute('studio/create-atelier/') ?>">Открыть ателье</a>
</div>
<div class="store">
	<h2>Магазин</h2>
	<p>
		Создав магазин, вы сможете размещать предложения продажи материалов и комплектующих для шитья
	</p>
	<a href="<?= Url::toRoute('studio/create-store/') ?>">Открыть магазин</a>
</div>