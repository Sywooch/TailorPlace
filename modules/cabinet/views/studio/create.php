<?php
/**
 * Страница регистрации студии.
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\modules\cabinet\models\StudioForm $studioForm
 */
// TODO на этой странице почему-то ловается тултип на иконке выхода

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use app\modules\assets\studio\CreateStudioAsset;

CreateStudioAsset::register($this);

$fieldTemplate = '<div class="left-col">{label}</div><div class="center-col">{input}<div class="help-block"></div></div>';
$requiredFieldTemplate = '<div class="left-col"><i class="icon asterisk"></i>{label}</div><div class="center-col">{input}<div class="help-block"></div></div>';
$selectTemplate = '<div class="left-col"><i class="icon asterisk"></i>{label}</div><div class="center-col"><div class="select currency">{input}<div class="select-button"><span class="caret"></span></div></div><div class="help-block"></div></div>';
if ($studioForm->getType() === 'atelier') {
    $studioLabel = '<i class="icon asterisk"></i>Название ателье';
    $studioType = 'ателье';
} else {
    $studioLabel = '<i class="icon asterisk"></i>Название магазина';
    $studioType = 'магазина';
}
?>
<main>
    <div class="panel big-panel">
        <?php
        $form = ActiveForm::begin([
            'id' => 'studio-form',
            'fieldConfig' => [
                'template' => $fieldTemplate,
            ],
        ]);
        ?>
        <div class="panel-header">
            <?php if ($studioForm->getType() === 'atelier'): ?>
                <div class="icon-circle atelier"><i></i></div><h3>Регистрация ателье</h3>
            <?php else: ?>
                <div class="icon-circle store"><i></i></div><h3>Регистрация магазина</h3>
            <?php endif ?>
        </div>
        <div class="panel-body">
            <ul>
                <li>
                    <?= $form->errorSummary($studioForm, [
                        'header' => ''
                    ])
                    ?>
                </li>
                <li>
    <!-- TODO сделать справа область с названием, как в личном кабинете под фотографией,
        чтобы пользователь сразу видел, как будет выглядеть надпись. Заполнять с пом-ю Js.
    -->
                     <?= $form->field($studioForm, 'name')
                         ->label($studioLabel);
                     ?>
                </li>
                <li>
                    <?= $form->field($studioForm, 'countryName', [
                            'template' => $requiredFieldTemplate,
                        ])->widget(AutoComplete::className(),
                        [
                            'model' => $studioForm,
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
                    <?= Html::activeHiddenInput($studioForm, 'countryId') ?>
                </li>
                <li>
                    <?= $form->field($studioForm, 'cityName', [
                            'template' => $requiredFieldTemplate,
                        ])->widget(AutoComplete::className(),
                        [
                                'model' => $studioForm,
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
                    <?= Html::activeHiddenInput($studioForm, 'cityId') ?>
                </li>
                <!-- TODO раскомментить, когда добавится поддержка отображения валюты на всех страницах, пока только рубли -->
<!--                <li>-->
<!--                    --><?//= $form->field($studioForm, 'currencyId', [
//                            'template' => $selectTemplate,
//                        ])->dropDownList(
//                            ArrayHelper::map($studioForm->getCurrencyList(), 'id', 'code')
//                        )
//                    ?>
<!--                </li>-->
                <li class="heighCol checkboxList">
                    <div class="left-col">Способ доставки</div>
                    <div class="center-col">
                        <ul>
                        <?php
                        $deliveryList = $studioForm->getDeliveryList();
                        foreach ($deliveryList as $delivery) {
                            $iconClass = strtolower(str_replace(' ', '-', $delivery['name_en']));
                            $id = 'studioform-deliveryList_' . $delivery['id'];
                            $checked = ($studioForm->deliveryList && in_array($delivery['id'], $studioForm->deliveryList));
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
                    <?= $form->field($studioForm, 'custom_delivery')->textInput([
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
                            $paymentList = $studioForm->getPaymentList();
                            foreach ($paymentList as $payment) {
                                $iconClass = strtolower(str_replace(' ', '-', $payment['name_en']));
                                $id = 'studioform-paymentList_' . $payment['id'];
                                $checked = ($studioForm->paymentList && in_array($payment['id'], $studioForm->paymentList));
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
                    <?= $form->field($studioForm, 'custom_payment')->textInput([
                            'placeholder' => 'Другой способ оплаты',
                            'class' => 'form-control addable'
                        ])
                        ->label('')
                    ?>
                </li>
                <li>
                    <?= $form->field($studioForm, 'slogan') ?>
                </li>
                <li class="heighCol">
                    <?= $form->field($studioForm, 'description')
                        ->textArea([
                            'placeholder' => 'Здесь вы можете дать подробное описание вашего ' . $studioType,
                        ])
                    ?>
                </li>
            </ul>
        </div>
        <div class="panel-footer">
            <div class="button yellow" id="register-action">
                <div class="low-layer"></div>
                <button type="submit">Завершить регистрацию</button>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</main>