<?php
/**
 * @var $hasStudio boolean
 * @var $User app\modules\users\models\User
 */

use yii\helpers\Url;

?>
<div id="user-data" class="info-wrapper">
	<h4 class="icon-line big-red-medium"><i class="icon person"></i><span>Аккаунт</span></h4>
    <div id="user-redact" class="button">
        <div class="low-layer"></div>
        <a data-type="button" href="<?= Url::toRoute('user-redact') ?>">Редактировать</a>
    </div>
	<ul>
		<li>
			<div class="left-col">Логин</div>
			<div class="right-col"><?= $User->login ?></div>
		</li>
		<li>
			<div class="left-col">E-mail</div>
			<div class="right-col"><?= $User->email ?></div>
		</li>
		<li>
			<div class="left-col">Дата регистрации</div>
			<div class="right-col"><?= date_format(date_create($User->create_time), 'd.m.Y') ?></div>
		</li>
		<li>
			<div class="left-col">Страна<?= $hasStudio ? ' доставки' : '' ?></div>
			<div class="right-col"><?= ($country = $User->country->getName()) ? $country : '—' ?></div>
		</li>
		<li>
			<div class="left-col">Город<?= $hasStudio ? ' доставки' : '' ?></div>
			<div class="right-col"><?= ($city = $User->city->getName()) ? $city : '—' ?></div>
		</li>
		<li>
			<div class="left-col">
				<span>Адрес доставки</span><br>
				<small>Никому не виден, подставляется<br>при оформлении заказа</small>
			</div>
			<div class="right-col">
				<?= $User->address ? $User->address : '—' ?>
			</div>
		</li>
	</ul>
</div>