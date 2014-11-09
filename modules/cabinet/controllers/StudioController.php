<?php

namespace app\modules\cabinet\controllers;

use Yii;
use app\controllers\CommonController;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\ForbiddenHttpException;
use app\modules\users\models\User;
use app\modules\studio\models\Studio;
use app\modules\cabinet\models\StudioForm;
use app\modules\cabinet\models\GoodForm;
use app\models\Country;
use app\models\City;
use app\models\Delivery;
use app\models\Payment;
use app\modules\good\models\Good;
use app\modules\good\models\Photo;

class StudioController extends CommonController
{
	public $layout = 'cabinet';

	/**
	 * Элементы хлебных крошек
	 * @var array
	 */
	public $breadcrumbItems = [
		'index' => 'not add',
		'what-create' => 'Регистрация ателье/магазина',
		'create-atelier' => 'Регистрация ателье',
		'create-store' => 'Регистрация магазина',
		'add-good' => 'Добавление товара',
	];

	public function actionIndex()
	{
		$sectionList = ['all', 'sale', 'vitrine'];
		$orderList = ['name_ask', 'name_desk', 'price_ask', 'price_desk', 'date_ask', 'date_desk'];
		$User = Yii::$app->user->identity;
		$Studio = $User->studio;
		if ($Studio->type == 'atelier') {
			$studioType = 'Мое ателье';
		} else {
			$studioType = 'Мой магазин';
		}
		$this->addBreadcrumbsItem(['label' => $studioType]);

		$section = in_array(Yii::$app->request->get('section'), $sectionList) ? Yii::$app->request->get('section') : '';
		$order = in_array(Yii::$app->request->get('order'), $orderList) ? Yii::$app->request->get('order') : '';

		$Goods = $Studio->goods;
		foreach ($Goods as $key => $Good) {
			// var_dump($Good->photos);
		}
		

		return $this->render('index', [
            'studioType' => $studioType,
            'Studio' => $Studio,
            'section' => $section,
            'order' => $order
        ]);
	}

	public function actionWhatCreate()
	{
        $this->layout = '@app/views/layouts/main-layout';
		return $this->render('whatCreate');
	}

	public function actionCreateAtelier()
	{
        $User = Yii::$app->user->identity;
		if ($User->studio !== null) {
			throw new ForbiddenHttpException("Доступ запрещен");
		}
        $StudioForm = new StudioForm('atelier', ['scenario' => 'create-atelier']);
        return $this->createStudio($StudioForm, $User);
	}

	public function actionCreateStore()
	{
        $User = Yii::$app->user->identity;
		if ($User->studio !== null) {
			throw new ForbiddenHttpException("Доступ запрещен");
		}
        $StudioForm = new StudioForm('store', ['scenario' => 'create-store']);
        return $this->createStudio($StudioForm, $User);
	}

	private function createStudio($StudioForm, \app\modules\users\models\User $User)
	{
		if ($StudioForm->load(Yii::$app->request->post()) && $StudioForm->validate()) {
        	$Studio = new Studio();
        	$Studio->type = $StudioForm->type;
        	$Studio->name = $StudioForm->name;
        	$User->country_id = $StudioForm->countryId;
        	$User->city_id = $StudioForm->cityId;
        	$Studio->currency_id = $StudioForm->currencyId;
        	$Studio->custom_delivery = $StudioForm->custom_delivery;
        	$Studio->custom_payment = $StudioForm->custom_payment;
        	$Studio->slogan = $StudioForm->slogan;
        	$Studio->description = $StudioForm->description;
        	// Сохраним студию назначив ее пользователю
        	$User->link('studio', $Studio);

        	// Когда у Студии будет id (после записи), назначим связи многие ко многим
        	// TODO попробовать сразу подать массив в link, т.к. запрос на каждую итерацию
        	$deliveryObjects = Delivery::findAll($StudioForm->deliveryList);
        	foreach ($deliveryObjects as $delivery) {
        		$Studio->link('delivery', $delivery);
        	}

        	$paymentObjects = Payment::findAll($StudioForm->paymentList);
        	foreach ($paymentObjects as $payment) {
        		$Studio->link('payment', $payment);
        	}

        	// Назначим новую роль пользователю (atelierOwner или storeOwner)
        	$User->assignRole($Studio->type . 'Owner');

        	// Рендерим страницу магазина или ателье
        	return $this->redirect(['index']);
        }

        $StudioForm->fillCountry($User);
        $StudioForm->fillCity($User);

		return $this->render('create', [
            'studioForm' => $StudioForm,
        ]);
	}

	public function actionAddGood()
	{
		$GoodForm = new GoodForm(Yii::$app->user->identity->studio);
		return $this->render('addGood', [
			'GoodForm' => $GoodForm,
		]);
	}

	// TODO перенести эти два метода в commonController
	/**
	 * Возвращает список стран в Json формате
	 * AJAX метод
	 * @return null
	 */
    public function actionGetCountryList()
    {
        $input = trim(strip_tags(Yii::$app->request->get('term')));
        $result = Country::getCountryList($input);

        echo Json::encode($result);
    }

	/**
	 * Возвращает список городов в Json формате
	 * AJAX метод
	 * @return null
	 */
    public function actionGetCityList()
    {
        $id = (int)Yii::$app->request->post('id');
        $input = trim(strip_tags(Yii::$app->request->get('term')));
        $result = City::getCityList($id, $input);

        echo Json::encode($result);
    }
}