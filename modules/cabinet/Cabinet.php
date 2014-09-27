<?php

namespace app\modules\cabinet;

use Yii;
use yii\web\ForbiddenHttpException;

class Cabinet extends \yii\base\Module
{
    /**
     * Шаблон для модуля
     * @var [type]
     */
    public $layout = 'cabinet';

	public function beforeAction($action)
	{
	    if (parent::beforeAction($action)) {
	    	// Запретим доступ неавторизованным пользователям
	    	if (Yii::$app->getUser()->isGuest) {
	    		throw new ForbiddenHttpException('У вас нет прав просматривать данную страницу.');
	    	}
	        $action->controller->addBreadcrumbsItem(['label' => 'Личный кабинет', 'url' => ['/cabinet']]);
	        $action->controller->addBreadcrumbsItem($action->controller->breadcrumbItem);
	        return true;  // or false if needed
	    } else {
	        return false;
	    }
	}
}
