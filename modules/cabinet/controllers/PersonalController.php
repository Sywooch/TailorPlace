<?php

namespace app\modules\cabinet\controllers;

use Yii;
use app\controllers\CommonController;
use yii\filters\AccessControl;
use app\modules\users\models\User;
use app\modules\studio\models\Studio;

class PersonalController extends CommonController
{
	/**
	 * Элементы хлебных крошек
	 * @var array
	 */
	public $breadcrumbItems = [
		'index' => 'Персональные данные'
	];
	// public function behaviors()
	// {
	// 	return [
	// 		'access' => [
	// 			'class' => AccessControl::className(),
	// 			'rules' => [
	// 			    // Разрешаем доступ нужным пользователям.
	// 				[
	// 					'allow' => false,
	// 					'roles' => ['?']
	// 				],
	// 				[
	// 					'allow' => true,
	// 					'roles' => ['@']
	// 				],
	// 			]
	// 		]
	// 	];
	// }
	public function actionIndex()
	{
		$User = Yii::$app->getUser()->identity;
		$userView = $this->generateUserView($User);

		$Studio = $User->studio;
		if ($Studio) {
			$studioView = $this->generateStudioView($Studio);
		}

		return $this->render('index', [
			'userView' => $userView,
			'studioView' => $studioView,
		]);
	}

	private function generateUserView(\app\modules\users\models\User $User)
	{
		return $this->renderPartial('userInfo', [
			'user' => $User]);
	}

	private function generateStudioView(\app\modules\studio\models\Studio $Studio)
	{
		return $this->renderPartial('studioInfo', [
			'studio' => $Studio]);
	}
}