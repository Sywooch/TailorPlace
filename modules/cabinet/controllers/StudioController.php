<?php

namespace app\modules\cabinet\controllers;

use Yii;
use app\controllers\CommonController;
use yii\filters\AccessControl;
use app\modules\users\models\User;
use app\modules\studio\models\Studio;
use app\modules\cabinet\models\StudioCreateForm;

class StudioController extends CommonController
{
	/**
	 * Элементы хлебных крошек
	 * @var array
	 */
	public $breadcrumbItems = [
		'what-create' => 'Регистрация ателье/магазина',
		'create-atelier' => 'Регистрация ателье'
	];

	public function actionWhatCreate()
	{
		return $this->render('whatCreate');
	}

	public function actionCreateAtelier()
	{
        $Studio = new StudioCreateForm('atelier');
        $User = Yii::$app->user->identity;
        $Studio ->country = $User->country ? $User->country : null;
        $Studio ->country = $User->city ? $User->city : null;

		return $this->render('create', [
            'studio' => $Studio
        ]);
	}
}