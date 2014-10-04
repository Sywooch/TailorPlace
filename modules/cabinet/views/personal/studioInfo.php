<div id="studio-data">
	<h2><?= $studio->type ?></h2>
	<button id="studio-redact">Редактировать</button>
	<ul>
		<li>
			<div class="left-col">Название</div>
			<div class="right-col"><?= $studio->name ?></div>
		</li>
		<li>
			<div class="left-col">Дата регистрации</div>
			<div class="right-col"><?= date_format(date_create($studio->create_time), 'd.m.Y') ?></div>
		</li>
		<li>
			<div class="left-col">Слоган</div>
			<div class="right-col"><?= $studio->slogan ?></div>
		</li>
		<li>
			<div class="left-col">Описание</div>
			<div class="right-col"><?= $studio->description ?></div>
		</li>
	</ul>
</div>