<div class="content">
	<h1>Персональные данные</h1>
	<h2>Аккаунт</h2>
	<button>Редактировать</button>
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
	</ul>
</div>