<?php
/**
 * Страница регистрации студии.
 * @var yii\base\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\modules\cabinet\models\StudioCreateForm $studio
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php if ($studio->getType() === 'atelier'): ?>
    <h1 class="atelier">Регистрация ателье</h1>
<?php else: ?>
    <h1 class="store">Регистрация магазина</h1>
<?php endif ?>
<?php $form = ActiveForm::begin(); ?>

<?= $form->field($studio, 'name').
	$form->field($studio, 'country')->dropDownList(
			$studio->getCountryList()
		)
?>

<?php ActiveForm::end(); ?>