<?php
/**
 * Страница редактирования данных студии.
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\modules\cabinet\models\StudioForm $StudioForm
 */

use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;

$this->registerCssFile('@web/css/cabinet-personal-studioRedact.css', [
    'depends' => [AppAsset::className()]
]);
$this->registerJsFile('@web/js/checkCity.js', [
    'depends' => [AppAsset::className()]
]);

$fieldTemplate = '<div class="left-col">{label}</div><div class="center-col">{input}<div class="help-block"></div></div>';
$requiredFieldTemplate = '<div class="left-col"><i class="icon asterisk"></i>{label}</div><div class="center-col">{input}<div class="help-block"></div></div>';
?>
<div class="panel width-panel">
    <?php
    $form = ActiveForm::begin([
        'id' => 'studio-form','fieldConfig' => [
            'template' => $fieldTemplate,
        ],
    ]);
    ?>
    <div class="panel-header">
        <div class="icon-circle redact"><i></i></div><h3>Редактирование данных <?= $studioType ?></h3>
    </div>
    <div class="panel-body">
        <ul>
            <li>
                <?= $form->errorSummary($StudioForm, [
                    'header' => ''
                ])
                ?>
            </li>
            <li>
                <?= $form->field($StudioForm, 'countryName', [
                    'template' => $requiredFieldTemplate,
                ])->widget(AutoComplete::className(),
                    [
                        'model' => $StudioForm,
                        'attribute' => 'countryName',
                        'options' => [
                            'class' => 'form-control',
                            'title' => 'Страна',
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
                <?= Html::activeHiddenInput($StudioForm, 'countryId') ?>
            </li>
            <li>
                <?= $form->field($StudioForm, 'cityName', [
                    'template' => $requiredFieldTemplate,
                ])->widget(AutoComplete::className(),
                    [
                        'model' => $StudioForm,
                        'attribute' => 'cityName',
                        'options' => [
                            'class' => 'form-control',
                            'title' => 'Город',
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
                <?= Html::activeHiddenInput($StudioForm, 'cityId') ?>
            </li>
            <li class="heighCol checkboxList">
                <div class="left-col">Способ доставки</div>
                <div class="center-col">
                    <ul>
                        <?php
                        $deliveryList = $StudioForm->getDeliveryList();
                        foreach ($deliveryList as $delivery) {
                            $iconClass = strtolower(str_replace(' ', '-', $delivery['name_en']));
                            $id = 'studioform-deliveryList_' . $delivery['id'];
                            $checked = ($StudioForm->deliveryList && in_array($delivery['id'], $StudioForm->deliveryList));
                            echo Html::beginTag('li');
                            echo Html::beginTag('span', ['class' => 'icon-line']);
                            echo Html::checkbox('StudioForm[deliveryList][]', $checked, [
                                'id' => $id,
                                'value' => $delivery['id']
                            ]);
                            echo Html::beginTag('label', ['for' => $id, 'class' => 'bigger']);
                            echo Html::tag('i', '', ['class' => 'icon ' . $iconClass]);
                            echo Html::tag('span', $delivery['name_ru']);
                            echo Html::endTag('label');
                            echo Html::endTag('span');
                            echo Html::endTag('li');
                        }
                        ?>
                    </ul>
                </div>
                <!-- TODO сделать добавление нескольких своих способов. При этом придется вручную сверстать инпуты. -->
                <?= $form->field($StudioForm, 'custom_delivery')->textInput([
                    'placeholder' => 'Другой способ доставки',
                    'class' => 'form-control addable',
                ])
                    ->label('')
                ?>
            </li>
            <li class="heighCol checkboxList">
                <div class="left-col">Способ оплаты</div>
                <div class="center-col">
                    <ul>
                        <?php
                        $paymentList = $StudioForm->getPaymentList();
                        foreach ($paymentList as $payment) {
                            $iconClass = strtolower(str_replace(' ', '-', $payment['name_en']));
                            $id = 'studioform-paymentList_' . $payment['id'];
                            $checked = ($StudioForm->paymentList && in_array($payment['id'], $StudioForm->paymentList));
                            echo Html::beginTag('li');
                            echo Html::beginTag('span', ['class' => 'icon-line']);
                            echo Html::checkbox('StudioForm[paymentList][]', $checked, [
                                'id' => $id,
                                'value' => $payment['id']
                            ]);
                            echo Html::beginTag('label', ['for' => $id, 'class' => 'bigger']);
                            echo Html::tag('i', '', ['class' => 'icon ' . $iconClass]);
                            echo Html::tag('span', $payment['name_ru']);
                            echo Html::endTag('label');
                            echo Html::endTag('span');
                            echo Html::endTag('li');
                        }
                        ?>
                    </ul>
                </div>
                <?= $form->field($StudioForm, 'custom_payment')->textInput([
                    'placeholder' => 'Другой способ оплаты',
                    'class' => 'form-control addable'
                ])
                    ->label('')
                ?>
            </li>
            <li>
                <?= $form->field($StudioForm, 'slogan') ?>
            </li>
            <li class="heighCol">
                <?= $form->field($StudioForm, 'description')
                    ->textArea([
                        'placeholder' => 'Здесь вы можете дать подробное описание вашего ' . $studioType,
                    ])
                ?>
            </li>
        </ul>
    </div>
    <div class="panel-footer">
        <div class="button yellow" id="save-action">
            <div class="low-layer"></div>
            <button type="submit">Сохранить</button>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>