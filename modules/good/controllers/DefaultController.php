<?php

namespace app\modules\good\controllers;

use Yii;
use app\controllers\CommonController;
use app\modules\users\models\User;
use yii\filters\AccessControl;

class DefaultController extends CommonController
{
//	public $layout = 'main-layout';

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

    public function actionGood()
    {
        return $this->render('good');
    }
}