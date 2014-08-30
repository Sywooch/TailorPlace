<?php
/**
 * Страница авторизации пользователя.
 * @var yii\base\View $this
 * @var yii\widgets\ActiveForm $form
 * @var common\modules\users\models\User $model
 */
 
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = $this->title;
$this->params['page-id'] = 'login';
?>

<h1>Авторизация</h1>

<?php
$form = ActiveForm::begin();

echo $form->field($model, 'login').
$form->field($model, 'password')->passwordInput().
Html::submitButton('Войти', ['class' => 'btn btn-success btn-large pull-right']);

ActiveForm::end();
?>