<?php
/**
 * Страница регистрации студии.
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\modules\cabinet\models\StudioCreateForm $studio
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
if ($studio->countryId){
    $this->registerJs("
    $(function(){
        checkCities(". $studio->countryId .", 'studiocreateform-cityname', '" . Url::toRoute('get-city-list') . "');
    });
");
}


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
            'title' => 'Название страны',
            'placeholder' => 'Начните вводить название страны'
        ],
        'clientOptions' => [
            'source' => Url::toRoute('get-country-list'),
            'select' => new JsExpression("function( event, ui ) {
                    $('#studiocreateform-countryid').val(ui.item.id);
                    successCountry = true;
                    $('.form-group.field-studiocreateform-countryname').removeClass('has-error').addClass('has-success');
                    checkCities(ui.item.id, 'studiocreateform-cityname', '".Url::toRoute('get-city-list')."');
                }"),
            'change' => new JsExpression("function( event, ui ) {
                    successCountry = false
                }"),
            'close' => new JsExpression("function( event, ui ) {
                    if (successCountry == false) {
                    $('.form-group.field-studiocreateform-countryname').removeClass('has-success').addClass('has-error');
                    }
                }"),
        ]
    ])
?>
<?= Html::activeHiddenInput($studio, 'countryId') ?>
<?= $form->field($studio, 'cityName')->widget(AutoComplete::className(),
    [
            'model' => $studio,
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
                    $('#studiocreateform-cityid').val(ui.item.id);
                    successCity = true;
                    $('.form-group.field-studiocreateform-cityname').removeClass('has-error').addClass('has-success');
                }"),
                'change' => new JsExpression("function( event, ui ) {
                    successCity = false
                }"),
                'close' => new JsExpression("function( event, ui ) {
                    if (successCity == false) {
                    $('.form-group.field-studiocreateform-cityname').removeClass('has-success').addClass('has-error');
                    }
                }"),
            ],
    ])
?>
<?= Html::activeHiddenInput($studio, 'cityId') ?>
<?= $form->field($studio, 'currencyId')->dropDownList(
        ArrayHelper::map($studio->getCurrencyList(), 'id', 'code')
    )
?>
<?= $form->field($studio, 'deliveryList')->checkboxList(
    ArrayHelper::map($studio->getDeliveryList(), 'id', 'name_ru')
)
?>
<?= $form->field($studio, 'custom_delivery')
	->textInput([
		'placeholder' => 'Другой способ доставки',
		'class' => 'form-control addable'
	])
	->label('')
?>
<?= $form->field($studio, 'paymentList')->checkboxList(
    ArrayHelper::map($studio->getPaymentList(), 'id', 'name_ru')
)
?>
<?= $form->field($studio, 'custom_payment')
	->textInput([
		'placeholder' => 'Другой способ оплаты',
		'class' => 'form-control addable'
	])
	->label('')
?>
<?= $form->field($studio, 'slogan') ?>
<?= $form->field($studio, 'description')
	->textArea([
		'placeholder' => 'Здесь вы можете дать подробное описание вашего ателье',
	])
?>
<?php ActiveForm::end(); ?>