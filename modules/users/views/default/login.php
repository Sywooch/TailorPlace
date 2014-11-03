<?php
/**
 * Страница авторизации пользователя.
 * @var yii\base\View $this
 * @var yii\widgets\ActiveForm $form
 * @var common\modules\users\models\User $model
 */

use yii\widgets\ActiveForm;
use app\assets\AppAsset;

$this->registerCssFile('@web/css/login.css', [
    'depends' => [AppAsset::className()]
]);

$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = $this->title;
$this->params['page-id'] = 'login';

$fieldTemplate = '<div class="left-col">{label}</div><div class="center-col">{input}<div class="help-block"></div></div>';
?>


<div class="panel">
    <?php
    $form = ActiveForm::begin([
        'fieldConfig' => [
            'template' => $fieldTemplate
        ]
    ]);
    ?>
    <div class="panel-header">
        <div class="icon-circle person-green"><i></i></div><h3>Авторизация</h3>
    </div>
    <div class="panel-body">
        <ul>
            <li>
                <?= $form->errorSummary($model, [
                    'header' => ''
                ])
                ?>
            </li>
            <li>
                <?= $form->field($model, 'login') ?>
            </li>
            <li>
                <?= $form->field($model, 'password')->passwordInput() ?>
            </li>
        </ul>
    </div>
    <div class="panel-footer">
        <div class="button yellow" id="login-action">
            <div class="low-layer"></div>
            <button type="submit" data-type="button" class="icon-line"><i class="icon login"></i><span>Войти</span></button>
        </div>
    </div>
    <?php ActiveForm::end() ?>
</div>