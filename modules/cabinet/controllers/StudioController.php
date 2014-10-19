<?php

namespace app\modules\cabinet\controllers;

use Yii;
use app\controllers\CommonController;
use yii\filters\AccessControl;
use yii\helpers\Json;
use app\modules\users\models\User;
use app\modules\studio\models\Studio;
use app\modules\cabinet\models\StudioForm;
use app\models\Country;
use app\models\City;

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
        $StudioForm = new StudioForm('atelier', ['scenario' => 'create-atelier']);
        $User = Yii::$app->user->identity;
        if ($StudioForm->load(Yii::$app->request->post()) && $StudioForm->validate()) {
        	$Studio = new Studio();
        	$Studio->name = $StudioForm->name;
        	$User->country_id = $StudioForm->countryId;
        	$User->sity_id = $StudioForm->sityId;
        	$Studio->currency_id = $StudioForm->currencyId;
        }

        $StudioForm->fillCountry($User);
        $StudioForm->fillCity($User);



		return $this->render('create', [
            'studioForm' => $StudioForm,
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