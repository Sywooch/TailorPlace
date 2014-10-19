<?php
/**
 * Страница регистрации студии.
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\modules\cabinet\models\StudioForm $studioForm
 */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use app\modules\assets\StudioAsset;

StudioAsset::register($this);

// если у студии есть страна, то надо подгрузить ее города и раздизейблить поле городов
if ($studioForm->countryId){
    $this->registerJs("
    $(function(){
        checkCities(". $studioForm->countryId .", 'studioform-cityname', '" . Url::toRoute('get-city-list') . "');
    });
");
}


?>

<?php if ($studioForm->getType() === 'atelier'): ?>
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

<?= $form->field($studioForm, 'name') ?>
<?= $form->field($studioForm, 'countryName')->widget(AutoComplete::className(),
    [
        'model' => $studioForm,
        'attribute' => 'countryName',
        'options' => [
            'class' => 'form-control',
            'title' => 'Название страны',
            'placeholder' => 'Начните вводить название страны'
        ],
        'clientOptions' => [
            'source' => Url::toRoute('get-country-list'),
            'select' => new JsExpression("function( event, ui ) {
                    $('#studioform-countryid').val(ui.item.id);
                    successCountry = true;
                    $('.form-group.field-studioform-countryname').removeClass('has-error').addClass('has-success');
                    checkCities(ui.item.id, 'studioform-cityname', '".Url::toRoute('get-city-list')."');
                }"),
            'change' => new JsExpression("function( event, ui ) {
                    successCountry = false
                }"),
            'close' => new JsExpression("function( event, ui ) {
                    if (successCountry == false) {
                    $('.form-group.field-studioform-countryname').removeClass('has-success').addClass('has-error');
                    }
                }"),
        ]
    ])
?>
<?= Html::activeHiddenInput($studioForm, 'countryId') ?>
<?= $form->field($studioForm, 'cityName')->widget(AutoComplete::className(),
    [
            'model' => $studioForm,
            'attribute' => 'cityName',
            'options' => [
                'class' => 'form-control',
                'title' => 'Название города',
                'placeholder' => 'Начните вводить название города',
                'disabled' => 'disabled'
            ],
            'clientOptions' => [
                'source' => Url::toRoute('get-city-list'),
                'select' => new JsExpression("function( event, ui ) {
                    $('#studioform-cityid').val(ui.item.id);
                    successCity = true;
                    $('.form-group.field-studioform-cityname').removeClass('has-error').addClass('has-success');
                }"),
                'change' => new JsExpression("function( event, ui ) {
                    successCity = false
                }"),
                'close' => new JsExpression("function( event, ui ) {
                    if (successCity == false) {
                    $('.form-group.field-studioform-cityname').removeClass('has-success').addClass('has-error');
                    }
                }"),
            ],
    ])
?>
<?= Html::activeHiddenInput($studioForm, 'cityId') ?>
<?= $form->field($studioForm, 'currencyId')->dropDownList(
        ArrayHelper::map($studioForm->getCurrencyList(), 'id', 'code')
    )
?>
<?= $form->field($studioForm, 'deliveryList')->checkboxList(
    ArrayHelper::map($studioForm->getDeliveryList(), 'id', 'name_ru')
)
?>
<?= $form->field($studioForm, 'custom_delivery')
	->textInput([
		'placeholder' => 'Другой способ доставки',
		'class' => 'form-control addable'
	])
	->label('')
?>
<?= $form->field($studioForm, 'paymentList')->checkboxList(
    ArrayHelper::map($studioForm->getPaymentList(), 'id', 'name_ru')
)
?>
<?= $form->field($studioForm, 'custom_payment')
	->textInput([
		'placeholder' => 'Другой способ оплаты',
		'class' => 'form-control addable'
	])
	->label('')
?>
<?= $form->field($studioForm, 'slogan') ?>
<?= $form->field($studioForm, 'description')
	->textArea([
		'placeholder' => 'Здесь вы можете дать подробное описание вашего ателье',
	])
?>
<?= Html::submitButton('Завершить регистрацию', ['class' => 'btn btn-success btn-large center-block']) ?>

<?php ActiveForm::end(); ?>