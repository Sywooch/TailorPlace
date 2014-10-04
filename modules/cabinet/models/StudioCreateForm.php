<?php 
namespace app\modules\cabinet\models;

use Yii;
use yii\base\Model;

/**
 * Class StidioCreateForm
 * @package app\modules\cabinet\models
 * Модель формы регистрации студии.
 *
 * @property string $username Логин
 * @property string $password Пароль
 * @property boolean $rememberMe Запомнить меня
 */
class StidioCreateForm extends Model
{
	/**
	 * Переменная используется для сбора пользовательской информации, но не сохраняются в базу данных.
	 * @var string $username Логин
	 */
	public $username;

	/**
	 * Переменная используется для сбора пользовательской информации, но не сохраняются в базу данных.
	 * @var string $password Пароль
	 */
	public $password;

	/**
	 * Переменная используется для сбора пользовательской информации, но не сохраняются в базу данных.
	 * @var boolean rememberMe Запомнить меня
	 */
	public $rememberMe = true;

	/**
	 * @var boolean|ActiveRecord Экземпляр пользователя
	 */
	protected $_user = false;

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			// Логин и пароль обязательны для заполнения.
			[['username', 'password'], 'required'],

			// Пароль валидируется функцией validatePassword().
			['password', 'validatePassword'],

			// [[rememberMe]] должен быть булево значение.
			['rememberMe', 'boolean']
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'username' => Yii::t('users', 'Логин'),
			'password' => Yii::t('users', 'Пароль'),
			'rememberMe' => Yii::t('users', 'Запомнить меня')
		];
	}

	protected function getCurrency()
	{
		
	}
}
