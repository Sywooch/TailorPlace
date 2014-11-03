<?php
/**
 * Страница регистрации нового пользователя.
 * @var yii\base\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\modules\users\models\User $model
 */
 
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
use app\assets\AppAsset;

$this->registerCssFile('@web/css/signup.css', [
    'depends' => [AppAsset::className()]
]);

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
$this->params['page-id'] = 'signup';

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
        <div class="icon-circle person-green"><i></i></div><h3>Регистрации</h3>
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
                <div class="right-col">От 3 до 12 символов</div>
            </li>
            <li>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <div class="right-col">Минимум 6 символов</div>
            </li>
            <li>
                <?= $form->field($model, 'repassword')->passwordInput() ?>
            </li>
            <li>
                <?= $form->field($model, 'email') ?>
            </li>
            <li class="captcha-line">
                <?= $form->field($model, 'captcha')->widget(Captcha::className(), [
                    'captchaAction' => '/captcha',
                    'template' => '{input}{image}'
                ])
                ?>
                <div class="right-col"><span>←</span><span>Введите код<br>с картинки</span></div>
            </li>
        </ul>
    </div>
    <div class="panel-footer">
        <div class="button yellow" id="signup-action">
            <div class="low-layer"></div>
            <button type="submit">Зарегистрироваться</button>
        </div>
        <?= $form->field($model, 'acceptAgreement', [
            'template' => '{input} {label}',
            'options' => ['id' => 'acceptAgreement']
        ])->checkbox([], false)
        ?>
    </div>
    <?php ActiveForm::end() ?>
</div>
<div class="dashed scissor-left"></div>
<div id="agreement">
    <h4>Соглашение</h4>
    <p>
        Регистрируясь на сайте tailor-place.com, вы становитесь его участником. Данные, которые вы вносите в поля форм, будут сохраняться в базе данных. Для удаления своего аккаунта, вы должны написать заявление и отослать его администрации сайта. После удаления аккаунта, касающиеся вас данные будут храниться в течение 6-ти месяцев, к ним никто не будет иметь доступ, кроме администрации сайта. В течение этого периода вы можете восстановить свой аккаунт, написав заявление и отослав его администрации сайта.
    </p>
    <p>
        Администрация сайта не несет ответственности за обман при совершении сделок между пользователями, так как не участвует непосредственно в товарно-денежном обороте. Сайт призван помочь людям, предлагающим услуги, и людям, желающим получить данные услуги, найти друг друга и осуществить контакт. Взаимодействия между пользователями основаны на обоюдном доверии. Договор между пользователями не является офертой. Для уменьшения вероятности обманов введены системы рейтингов и комментирования. Пользуясь ими, проверяйте пользователей, с которыми хотите совершить сделку.
    </p>
    <p>
        При общении между пользователями запрещено использование нецензурной лексики, запрещено оскорблять пользователей, пугать пользователей и угрожать им.
    </p>
    <p>
        Регистрируясь на сайте, вы принимаете данное соглашение и обязываетесь соблюдать вышеперечисленные правила. В случае несоблюдения правил, администрация имеет право совершать ответные действия по наказанию пользователя-нарушителя, вплоть до блокоровки аккаунта без права восстановления.
    </p>
    <div class="how-be-this">
        <span class="darker"><span>↓</span> <a href="" class="dashed-underline">Развернуть</a></span>
    </div>
</div>
<div class="dashed scissor-right"></div>