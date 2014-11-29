<?php

/**
 * @var app\modules\users\models\User $User
 */

use yii\widgets\ActiveForm;
use app\assets\AppAsset;

$this->registerCssFile('@web/css/cabinet-personal-studioRedact.css', [
    'depends' => [AppAsset::className()]
]);

$fieldTemplate = '<div class="left-col">{label}</div><div class="center-col">{input}<div class="help-block"></div></div>';
?>
<div class="panel width-panel">
    <?php
    $form = ActiveForm::begin([
        'id' => 'user-form','fieldConfig' => [
            'template' => $fieldTemplate,
        ],
    ]);
    ?>
    <div class="panel-header">
        <div class="icon-circle redact"><i></i></div><h2>Редактирование персональных данных</h2>
    </div>
    <div class="panel-body">
        <ul>
            <li>
                <?= $form->errorSummary($User, [
                    'header' => ''
                ])
                ?>
            </li>
            <li>
                <?= $form->field($User, 'oldPassword')->passwordInput() ?>
            </li>
            <li>
                <?= $form->field($User, 'newPassword')->passwordInput() ?>
            </li>
            <li>
                <?= $form->field($User, 'repassword')->passwordInput() ?>
            </li>
            <li>
                <div class="form-group field-user-repassword">
                    <div class="left-col"><label>Страна доставки</label></div><div class="center-col">
                        <input class="form-control" type="text" value="" name="StudioForm[slogan]">
                        <div class="help-block"></div>
                    </div>
                </div>
            </li>
            <li>
                <div class="form-group field-user-repassword">
                    <div class="left-col"><label>Город доставки</label></div><div class="center-col">
                        <input class="form-control" type="text" value="" name="StudioForm[slogan]">
                        <div class="help-block"></div>
                    </div>
                </div>
            </li>
            <li>
                <div class="form-group field-user-repassword">
                    <div class="left-col"><label>Адрес доставки</label></div><div class="center-col">
                        <input class="form-control" type="text" value="" name="StudioForm[slogan]">
                        <div class="help-block"></div>
                    </div>
                </div>
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