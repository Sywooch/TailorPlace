<?php

namespace app\modules\cabinet\controllers;

use app\controllers\CommonController;
use yii\filters\AccessControl;

class DefaultController extends CommonController
{
	public $layout = 'cabinet';

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
		return $this->render('index');
	}
}