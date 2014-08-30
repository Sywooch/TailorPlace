<?php

namespace app\modules\users;

class Users extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\users\controllers';

	/**
	 * @var boolean Если данное значение false, пользователи при регистрации должны будут подтверждать свои электронные адреса
	 */
	public $activeAfterRegistration = false;

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

	/**
	 * Отправляем ключ активации учётной записи на указаный при регистарции e-mail.
	 * Вызывается только если $this->activeAfterRegistration = false.
	 * @param User $event
	 * @return boolean
	 */
	public function onSignup($event)
	{
		// $model = $event->sender;
		// $cr = new ConsoleRunner();
		// return $cr->run('users/signup ' . $model['email'] . ' ' . $model['auth_key']);
	}
}
