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
			// Сообщаем пользователю что регистрация прошла успешно.
			Yii::$app->session->setFlash('success', 'users', 'Учётная запись была успешно создана! Вам выслано письмо для подтверждения регистрации. Пока вы не подтвердите регистрацию, некоторые функции сайта будут недоступны');
			// Авторизуем сразу пользователя.
			Yii::$app->getUser()->login($model);
			// Возвращаем пользователя на главную.
			return $this->goHome();
		}
		// Рендерим представление.
		return $this->render('signup', [
			'model' => $model
		]);
	}

	/**
	 * Авторизуем пользователя.
	 */
	public function actionLogin()
	{
		// В случае если пользователь не гость, то мы перенаправляем его на главную страницу. В противном случае он бы увидел 403-ю ошибку.
		if (!Yii::$app->user->isGuest) {
			$this->goHome();
		}
		$model = new User(['scenario' => 'login']);
		if ($model->load(Yii::$app->request->post())) {
			$user = $this->findByUsername($model->login);
			$user->validatePassword($model->password);
		}
		/*$model = new LoginForm;
		if ($model->load(Yii::$app->request->post()) && $model->login()) {
			// В случае успешной авторизации, перенаправляем пользователя обратно на предыдущию страницу.
			return $this->goBack();
		}*/
		// Рендерим представление.
		$model->addError('login', 'very bad login');
		return $this->render('login', [
			'model' => $model
		]);
	}

	public function acttionLogout(){
		Yii::$app->getUser()->logout();
		return $this->goHome();
	}
}
