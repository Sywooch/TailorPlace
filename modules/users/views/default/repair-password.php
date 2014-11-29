<?php
/**
 * Страница восстановления пароля
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\modules\users\models\RepairPassForm $RepairPassForm
 */

use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
use app\assets\AppAsset;

$this->registerCssFile('@web/css/repair-password.css', [
    'depends' => [AppAsset::className()]
]);

$fieldTemplate = '<div class="left-col">{label}</div><div class="center-col">{input}<div class="help-block"></div></div>';
?>
<main>
    <div class="panel big-panel">
        <?php
        $form = ActiveForm::begin([
            'fieldConfig' => [
                'template' => $fieldTemplate
            ]
        ]);
        ?>
        <div class="panel-header">
            <div class="icon-circle key"><i></i></div><h2>Восстановление пароля</h2>
        </div>
        <div class="panel-body">
            <p class="instruction italic">
                Вам на почту будет высланы инструкции по
                восстановлению пароля. Просто следуйте им.
            </p>
            <ul>
                <li>
                    <?= $form->errorSummary($RepairPassForm, [
                        'header' => ''
                    ])
                    ?>
                </li>
                <li>
                    <?= $form->field($RepairPassForm, 'email') ?>
                </li>
                <li class="captcha-line">
                    <?= $form->field($RepairPassForm, 'captcha')->widget(Captcha::className(), [
                        'captchaAction' => '/captcha',
                        'template' => '{input}{image}'
                    ])
                    ?>
                    <div class="right-col"><span>←</span><span>Введите код<br>с картинки</span></div>
                </li>
            </ul>
        </div>
        <div class="panel-footer">
            <div class="button yellow" id="repair-action">
                <div class="low-layer"></div>
                <button type="submit">Отправить запрос</button>
            </div>
        </div>
        <?php ActiveForm::end() ?>
    </div>
</main>