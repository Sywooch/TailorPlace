<?php
/**
 * Страница регистрации нового пользователя.
 * @var yii\base\View $this
 * @var yii\widgets\ActiveForm $form
 * @var common\modules\users\models\User $model
 */
 
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
$this->params['page-id'] = 'signup';
?>

<h1>Регистрации</h1>

<?php
$form = ActiveForm::begin();

echo $form->field($model, 'login').
$form->field($model, 'password')->passwordInput().
$form->field($model, 'repassword')->passwordInput().
$form->field($model, 'email').
$form->field($model, 'acceptAgreement')->checkbox().
Html::submitButton('Зарегистрироватся', ['class' => 'btn btn-success btn-large pull-right']);

ActiveForm::end();
?>