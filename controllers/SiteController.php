<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\FeedbackForm;

class SiteController extends CommonController
{
    public $layout = 'main-layout';
//    public function behaviors()
//    {
//        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'only' => ['logout'],
//                'rules' => [
//                    [
//                        'actions' => ['logout'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
//                ],
//            ],
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'logout' => ['post'],
//                ],
//            ],
//        ];
//    }

//    public function actions()
//    {
//        return [
//            'error' => [
//                'class' => 'yii\web\ErrorAction',
//            ],
//            'captcha' => [
//                'class' => 'yii\captcha\CaptchaAction',
//                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
//            ],
//        ];
//    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionNewsAll()
    {
        return $this->render('newsAll');
    }

    public function actionNewsInstance()
    {
        return $this->render('newsInstance');
    }

    public function action404()
    {
        return $this->render('404');
    }

    public function action403()
    {
        return $this->render('403', [
            'isGuest' => Yii::$app->user->isGuest,
        ]);
    }
}
