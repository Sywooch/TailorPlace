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
        $Studio->countryName = $User->country->name ? $User->country->name : null;
        $Studio->countryId = $User->country->id ? $User->country->id : null;
        $Studio->cityName = $User->city->name ? $User->city->name : null;
        $Studio->cityId = $User->city->id ? $User->city->id : null;

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