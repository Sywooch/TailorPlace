<?php

namespace app\modules\rbac\controllers;

use Yii;
use yii\web\Controller;
use app\modules\rbac\UserRoleRule;

class RbacController extends Controller
{
	public function actionInit()
	{
		// TODO доделать права
		$auth = Yii::$app->authManager;
		$auth->removeAll(); //Очистка rbac.php

		// Создание прав
		// Право входа в личный кабинет
		$viewCabinet = $auth->createPermission('viewCabinet');
		$viewCabinet->description = 'Просмотр личного кабинета';
		$auth->add($viewCabinet);

		// Право отправлять сообщения
		$sendMessages = $auth->createPermission('sendMessages');
		$sendMessages->description = 'Отправка сообщений';
		$auth->add($sendMessages);

		// Право оформлять заказ
		$createOrder = $auth->createPermission('createOrder');
		$createOrder->description = 'Оформление заказа';
		$auth->add($createOrder);

		// Правила применения
		$rule = new UserRoleRule(); // Apply our Rule that use the user roles from user table
		$auth->add($rule);

		// Роли и права
		// Роль user
		$user = $auth->createRole('user');
		$user->ruleName = $rule->name;
		$auth->add($user);
		// Добавление прав и потомков для  $atelierOwner
		$auth->addChild($user, $viewCabinet);
		$auth->addChild($user, $sendMessages);
		$auth->addChild($user, $createOrder);

		// Роль atelierOwner
		$atelierOwner = $auth->createRole('atelierOwner');
		$atelierOwner->ruleName = $rule->name;
		$auth->add($atelierOwner);
		// Добавление прав и потомков для  $atelierOwner
        $auth->addChild($atelierOwner, $user);

		// Роль storeOwner
		$storeOwner = $auth->createRole('storeOwner');
		$storeOwner->ruleName = $rule->name;
		$auth->add($storeOwner);
		// Добавление прав и потомков для  $storeOwner
        $auth->addChild($storeOwner, $user);

		// Роль admin
		$admin = $auth->createRole('admin');
		$admin->ruleName = $rule->name;
		$auth->add($admin);
		$auth->addChild($admin, $user);

		return $this->goHome();
	}
}