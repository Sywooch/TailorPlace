<?php

namespace app\modules\cabinet\controllers;

use Yii;
use app\controllers\CommonController;
use yii\filters\AccessControl;
use app\modules\cabinet\models\User;

class PersonalController extends CommonController
{
	/**
	 * Последний элемент хлебных крошек
	 * @var string
	 */
	public $breadcrumbItem = "Персональные данные";
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
		$user = Yii::$app->getUser()->identity;

		return $this->render('index', [
			'user' => $user]);
	}
}