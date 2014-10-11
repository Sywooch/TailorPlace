<?php
/**
 * Страница регистрации студии.
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\modules\cabinet\models\StudioCreateForm $studio
 * @var array $countryList
 */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use app\modules\assets\StudioAsset;

StudioAsset::register($this);

?>

<?php if ($studio->getType() === 'atelier'): ?>
    <h1 class="atelier">Регистрация ателье</h1>
<?php else: ?>
    <h1 class="store">Регистрация магазина</h1>
<?php endif ?>
<?php
    $form = ActiveForm::begin([
        'id' => 'studio-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => '{label}<div class="col-sm-9">{input}</div><div class="col-sm-10">{error}</div>',
            'labelOptions' => ['class' => 'col-sm-3 control-label'],
        ],
    ]);
?>

<?= $form->field($studio, 'name') ?>
<?= $form->field($studio, 'countryName')->widget(AutoComplete::className(),
    [
        'model' => $studio,
        'attribute' => 'countryName',
        'options' => [
            'class' => 'form-control',
            'placeholder' => ''
        ],
        'clientOptions' => [
            'source' => Url::toRoute('get-countries-list'),
            'select' => new JsExpression("function( event, ui ) {
                    console.log(ui.item);
                    $('#studiocreateform-countryid').val(ui.item.id);
                    fillCities();
                    }")
        ]
    ])->label('Название страны')
?>
<?= Html::activeHiddenInput($studio, 'countryId') ?>
<?= $form->field($studio, 'cityName')->widget(AutoComplete::className(),
    [
            'model' => $studio,
            'attribute' => 'countryName',
            'options' => [
                'class' => 'form-control',
                'title' => 'Название города',
                'placeholder' => ''
            ],
            'clientOptions' => [
                'source' => Url::toRoute('get-countries-list'),
                'select' => new JsExpression("function( event, ui ) {
                    console.log(ui.item);
                    $('#studiocreateform-cityid').val(ui.item.id);
                    }")
            ],
    ])->label('Название города')
?>
<?= Html::activeHiddenInput($studio, 'cityId') ?>

<?php ActiveForm::end(); ?>