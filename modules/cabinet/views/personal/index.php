<?php
use app\modules\assets\PersonalAsset;
PersonalAsset::register($this);
?>

<div class="content">
	<h1>Персональные данные</h1>
	<?= $userView ?>
</div>