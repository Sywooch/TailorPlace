<?php
/**
 * Страница создания товара.
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\modules\cabinet\models\GoodForm $GoodForm
 */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

$fieldTemplate = '<div class="left-col">{label}</div><div class="center-col">{input}<div class="help-block"></div></div>';
$requiredFieldTemplate = '<div class="left-col"><i class="icon asterisk"></i>{label}</div><div class="center-col">{input}<div class="help-block"></div></div>';
$selectTemplate = '<div class="left-col"><i class="icon asterisk"></i>{label}</div><div class="center-col"><div class="select category">{input}<div class="select-button"><span class="caret"></span></div></div><div class="help-block"></div></div>';
?>
<div class="panel width-panel">
    <?php
    $form = ActiveForm::begin([
        'id' => 'good-form','fieldConfig' => [
            'template' => $fieldTemplate,
        ],
    ]);
    ?>
    <div class="panel-header">
        <div class="icon-circle good"><i></i></div><h3>Добавление товара</h3>
    </div>
    <div class="panel-body">
        <ul>
            <li>
                <?= $form->errorSummary($GoodForm, [
                    'header' => ''
                ])
                ?>
            </li>
            <li>
                <?= $form->field($GoodForm, 'name', [
                    'template' => $requiredFieldTemplate,
                ])
                ?>
            </li>
            <li>
                <?= $form->field($GoodForm, 'price', [
                    'template' => $requiredFieldTemplate,
                ])
                ?>
            </li>
            <li>
                <?= $form->field($GoodForm, 'categories[]', [
                        'template' => $selectTemplate,
                    ])->dropDownList(
                        ArrayHelper::map($GoodForm->categoryList, 'id', 'name_ru')
                    )
                ?>
            </li>
            <li>
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
            </li>
            <?php
            if ($GoodForm->isStoreGood()) {
                echo $form->field($GoodForm, 'quantity');
            }
            ?>
            <?= $form->field($GoodForm, 'description')->textArea([
                    'placeholder' => 'Здесь вы можете дать подробное описание товара',
                ])
            ?>
        </ul>
    </div>
    <div class="panel-footer">
        <?php ActiveForm::end(); ?>
    </div>
</div>