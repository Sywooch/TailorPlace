<?php

namespace app\controllers;

use app\modules\users\models\User;
use yii\filters\AccessControl;

class CabinetController extends CommonController
{
	public $layout = 'cabinet';

	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
				    // Разрешаем доступ нужным пользователям.
					[
						'allow' => false,
						'roles' => ['?']
					],
					[
						'allow' => true,
						'roles' => ['@']
					],
				]
			]
		];
	}
	public function actionIndex()
	{
		return $this->render('statistic');
	}
}