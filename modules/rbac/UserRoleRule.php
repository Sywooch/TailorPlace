<?php

namespace app\modules\rbac;

use yii\rbac\Rule;

class UserRoleRule extends Rule
{
	public $name = 'userRole';

	public function execute($user, $item, $params)
	{
		if(isset(\Yii::$app->user->identity->role)){
			$role = \Yii::$app->user->identity->role;
		} else {
			return $item->name === 'guest';
		}

		switch ($item->name) {
			case 'admin':
				return $role == 'admin';
				break;

			case 'atelierOwner':
				return $role == 'admin' || $role == 'atelierOwner';
				break;

			case 'storeOwner':
				return $role == 'admin' || $role == 'storeOwner';
				break;

			case 'authorizedUser':
				return $role == 'admin' || $role == 'storeOwner' || $role == 'authorizedUser';
				break;

			default:
				return false;
				break;
		}
	}
}