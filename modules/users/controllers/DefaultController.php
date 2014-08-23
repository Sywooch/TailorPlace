<?php

namespace app\modules\users\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use app\modules\users\models\User;

class DefaultController extends Controller
{
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
				    // Разрешаем доступ нужным пользователям.
					[
						'allow' => true,
						'actions' => ['login', 'signup', 'activation', 'recovery'],
						'roles' => ['?']
					],
				]
			]
		];
	}

    public function actionIndex()
    {
        return $this->render('index');
    }

    	/**
	 * Создаём новую запись.
	 * В случае успеха, пользователь будет перенаправлен на view метод.
	 */
	public function actionSignup()
	{
		$model = new User(['scenario' => 'signup']);
		// Добавляем обработчик события который отправляет сообщение с клюом активации на e-mail адрес что был указан при регистрации.
		if ($this->module->activeAfterRegistration === false) {
			$model->on(User::EVENT_AFTER_INSERT, [$this->module, 'onSignup']);
		}

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			// Если после регистрации нужно подтвердить почтовый адрес, вызываем функцию отправки кода активации на почту.
			if ($this->module->activeAfterRegistration === false) {
				// Сообщаем пользователю что регистрация прошла успешно, и что на его e-mail был отправлен ключ активации аккаунта.
				Yii::$app->session->setFlash('success', Yii::t('users', 'Учётная запись была успешно создана. Через несколько секунд вам на почту будет отправлен код для активации аккаунта. В случае если письмо не пришло в течении 15 минут, вы можете заново запросить отправку ключа по данной <a href="{url}">ссылке</a>. Спасибо!', ['url' => Url::toRoute('resend')]));
			} else {
				// Авторизуем сразу пользователя.
				Yii::$app->getUser()->login($model);
				// Сообщаем пользователю что регистрация прошла успешно.
				Yii::$app->session->setFlash('success', Yii::t('users', 'Учётная запись была успешно создана!'));
			}
			// Возвращаем пользователя на главную.
			return $this->goHome();
		}
		// Рендерим представление.
		return $this->render('signup', [
			'model' => $model
		]);
	}
}
