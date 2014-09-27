<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class CommonController extends Controller
{
    /**
     * Массив экшэнов, которые запрещено сохранять для возврата на предыдущую страницу
     * @var array
     */
    protected $disableReturnToActions = [
        'login',
        'captcha',
    ];
    // TODO заполнить $disableReturnToActions

    public function init()
    {
        $this->on('beforeAction', function ($event) {
            // запоминаем страницу неавторизованного пользователя, чтобы потом отредиректить его обратно с помощью  goBack()
            if (Yii::$app->getUser()->isGuest) {
                $request = Yii::$app->getRequest();
                // исключаем страницу авторизации или ajax-запросы
                if (!($request->getIsAjax() || in_array($event->action->id, $this->disableReturnToActions) !== false)) {
                    Yii::$app->getUser()->setReturnUrl($request->getUrl());
                }
            }
        });
    }

    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'app\components\captcha\CaptchaAction',
            ],
        ];
    }

    /**
     * Добавить элемент в виджет Breadcrumbs
     * @param array|string $item
     */
    public function addBreadcrumbsItem($item)
    {
        Yii::$app->view->params['breadcrumbs'][] = $item;
    }
}