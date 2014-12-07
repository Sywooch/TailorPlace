<?php

namespace app\modules\cabinet\controllers;

use Yii;
use app\controllers\CommonController;
use app\modules\users\models\User;
use yii\filters\AccessControl;

class DefaultController extends CommonController
{
    public $breadcrumbItems = [
        'index' => 'not add',
        'basket' => 'Корзина',
        'place-order' => 'Оформление заказа',
        'orders' => 'Заказы',
    ];

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
        if (Yii::$app->user->identity->studio === null) {
            $action = 'index-user';
        } else {
            $action = 'index-studio';
        }
		return $this->render($action);
	}

    public function actionBasket()
    {
        return $this->render('basket');
    }

    public function actionPlaceOrder()
    {
        return $this->render('placeOrder');
    }

    public function actionOrders()
    {
        return $this->render('orders');
    }
}