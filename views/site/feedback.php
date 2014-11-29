<?php
/**
 * Страница обратной связи
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\models\FeedbackForm $FeedbackForm
 */

use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
use app\assets\AppAsset;

$this->registerCssFile('@web/css/feedback.css', [
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
            <ul>
                <li>
                    <?= $form->errorSummary($FeedbackForm, [
                        'header' => ''
                    ])
                    ?>
                </li>
                <li>
                    <?= $form->field($FeedbackForm, 'email') ?>
                </li>
                <li>
                    <?= $form->field($FeedbackForm, 'message')->textarea() ?>
                </li>
                <li class="captcha-line">
                    <?= $form->field($FeedbackForm, 'captcha')->widget(Captcha::className(), [
                        'captchaAction' => '/captcha',
                        'template' => '{input}{image}'
                    ])
                    ?>
                    <div class="right-col"><span>←</span><span>Введите код<br>с картинки</span></div>
                </li>
            </ul>
        </div>
        <div class="panel-footer">
            <div class="button yellow" id="feedback-action">
                <div class="low-layer"></div>
                <button type="submit">Отправить запрос</button>
            </div>
        </div>
        <?php ActiveForm::end() ?>
    </div>
</main>