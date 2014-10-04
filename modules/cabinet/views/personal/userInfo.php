<div id="user-data">
	<h2>Аккаунт</h2>
	<button id="user-redact">Редактировать</button>
	<ul>
		<li>
			<div class="left-col">Логин</div>
			<div class="right-col"><?= $user->login ?></div>
		</li>
		<li>
			<div class="left-col">E-mail</div>
			<div class="right-col"><?= $user->email ?></div>
		</li>
		<li>
			<div class="left-col">Дата регистрации</div>
			<div class="right-col"><?= date_format(date_create($user->create_time), 'd.m.Y') ?></div>
		</li>
		<li>
			<div class="left-col">Страна</div>
			<div class="right-col"><?= $user->country->getName() ?></div>
		</li>
		<li>
			<div class="left-col">Город</div>
			<div class="right-col"><?= $user->city->getName() ?></div>
		</li>
		<li>
			<div class="left-col">
				<span>Адрес</span>
				<small>Никому не виден, подставляется в форму заказа</small>
			</div>
			<div class="right-col">
				<?= $user->address ?>
			</div>
		</li>
	</ul>
</div>