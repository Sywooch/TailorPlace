<?php

namespace app\modules\cabinet\controllers;

use Yii;
use app\controllers\CommonController;
use yii\filters\AccessControl;
use app\modules\users\models\User;
use app\modules\studio\models\Studio;

class PersonalController extends CommonController
{
    public $layout = 'cabinet';

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

		$Studio = $User->studio;
        if ($Studio) {
            $hasStudio = true;
            $studioType = ($Studio->type == 'atelier') ? 'Ателье' : 'Магазин';
            $studioView = $this->generateStudioView($Studio, $studioType);
        } else {
            $hasStudio = false;
            $studioView = '';
        }

        $userView = $this->generateUserView($User, $hasStudio);

		return $this->render('index', [
			'userView' => $userView,
			'studioView' => $studioView
		]);
	}

	private function generateUserView(\app\modules\users\models\User $User, $hasStudio = false)
	{
		return $this->renderPartial('userInfo', [
			'User' => $User,
            'hasStudio' => $hasStudio,
        ]);
	}

	private function generateStudioView(\app\modules\studio\models\Studio $Studio, $studioType)
	{
		return $this->renderPartial('studioInfo', [
			'Studio' => $Studio,
            'studioType' => $studioType,
        ]);
	}
}