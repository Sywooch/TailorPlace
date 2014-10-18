<?php

namespace app\modules\cabinet\controllers;

use Yii;
use app\controllers\CommonController;
use yii\filters\AccessControl;
use yii\helpers\Json;
use app\modules\users\models\User;
use app\modules\studio\models\Studio;
use app\models\Country;
use app\models\City;
use app\modules\cabinet\models\StudioForm;

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
        $Studio = new StudioForm('atelier', ['scenario' => 'create-atelier']);
        $User = Yii::$app->user->identity;
        if ($Studio->load(Yii::$app->request->post()) && $Studio->validate()) {
        	
        }

        $Studio->fillCountry($User);
        $Studio->fillCity($User);



		return $this->render('create', [
            'studio' => $Studio,
        ]);
	}

    public function actionGetCountryList()
    {
        $input = trim(strip_tags(Yii::$app->request->get('term')));
        $result = Country::getCountryList($input);

        echo Json::encode($result);
    }

    public function actionGetCityList()
    {
        $id = (int)Yii::$app->request->post('id');
        $input = trim(strip_tags(Yii::$app->request->get('term')));
        $result = City::getCityList($id, $input);

        echo Json::encode($result);
    }
}