<?php

namespace app\modules\users\models;

use Yii;
use yii\base\Model;

class RepairPassForm extends Model
{
    /**
     * @var string Email, на который будет выслана инструкция по восстановлению пароля
     */
    public $email;

    /**
     * Капча
     * @var string
     */
    public $captcha;

    public function attributeLabels()
    {
        return [
            'email' => 'E-mail',
            'captcha' => 'Код подтверждение',
        ];
    }
}