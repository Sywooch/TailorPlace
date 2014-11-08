<?php
/**
 * Страница создания товара.
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\modules\cabinet\models\GoodForm $GoodForm
 */

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>
<h3>Добавление товара</h3>

<?php
    $form = ActiveForm::begin([
        'id' => 'good-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => '{label}<div class="col-sm-9">{input}</div><div class="col-sm-10">{error}</div>',
            'labelOptions' => ['class' => 'col-sm-3 control-label'],
        ],
    ]);
?>
<?= $form->field($GoodForm, 'name') ?>
<?= $form->field($GoodForm, 'price') ?>
<div class="input-group dropdown-group dropdown-left-group">
	<label class="col-sm-3 control-label" for="goodform-categories">Категория</label>
	<div class="col-sm-9">
	    <input type="text" class="form-control" >
	    <?= Html::activeHiddenInput($GoodForm, 'categories[]') ?>
	    <div class="input-group-btn">
	        <button data-toggle="dropdown" class="btn btn-default" type="button"><span class="caret"></span></button>
	        <div class="vertical-divider"></div>
	        <ul role="menu" class="dropdown-menu">
	            <li><a href="#">Товары</a></li>
	            <li class="divider"></li>
	            <li><a href="#">Ател./Маг.</a></li>
	            <li><a href="#">Ателье</a></li>
	            <li><a href="#">Магазины</a></li>
	        </ul>
	    </div><!-- /btn-group -->
    </div>
</div>
<?php
if ($GoodForm->isStoreGood()) {
	echo $form->field($GoodForm, 'quantity');
}
?>
<?= $form->field($GoodForm, 'description')->textArea([
		'placeholder' => 'Здесь вы можете дать подробное описание товара',
	])
?>

<?php ActiveForm::end(); ?>