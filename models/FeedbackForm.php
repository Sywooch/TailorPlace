<?php

namespace app\models;

use Yii;
use yii\base\Model;

class FeedbackForm extends Model
{
    /**
     * @var string Email, на который будет выслана инструкция по восстановлению пароля
     */
    public $email;

    /**
     * Сообщение
     * @var string
     */
    public $message;

    /**
     * Капча
     * @var string
     */
    public $captcha;

    public function attributeLabels()
    {
        return [
            'email' => 'E-mail',
            'message' => 'Сообщение',
            'captcha' => 'Код подтверждение',
        ];
    }
}