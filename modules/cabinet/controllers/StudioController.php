<?php

namespace app\modules\cabinet\controllers;

use Yii;
use app\controllers\CommonController;
use yii\filters\AccessControl;
use app\modules\users\models\User;
use app\modules\studio\models\Studio;

class StudioController extends CommonController
{
	/**
	 * Элементы хлебных крошек
	 * @var array
	 */
	public $breadcrumbItems = [
		'what-create' => 'Регистрация ателье/магазина'
	];

	public function actionWhatCreate()
	{
		return $this->render('whatCreate');
	}

	public function actionCreateAtelier()
	{
		return $this->render('createAtelier');
	}
}