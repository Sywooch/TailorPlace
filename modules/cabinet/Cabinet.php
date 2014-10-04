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
	        if (isset($action->controller->breadcrumbItems)) {
	        	$action->controller->addBreadcrumbsItem(['label' => 'Личный кабинет', 'url' => ['/cabinet']]);

				$items = $action->controller->breadcrumbItems[$action->id];
	        	if (is_array($items)) {
	        		foreach ($items as $item) {
	        			if (isset($item['url'])) {
	        				$action->controller->addBreadcrumbsItem([
	        					'label' => $item['label'],
	        					'url' => $item['url']
        					]);
	        			} else {
	        				$action->controller->addBreadcrumbsItem([
	        					'label' => $item['label']
        					]);
	        			}
	        		}
	        	} else {
	        		$action->controller->addBreadcrumbsItem(['label' => $items]);
	        	}
	        } else {
	        	$action->controller->addBreadcrumbsItem(['label' => 'Личный кабинет']);
	        }
	        return true;  // or false if needed
	    } else {
	        return false;
	    }
	}
}
