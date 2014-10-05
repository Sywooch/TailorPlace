<?php 
namespace app\modules\cabinet\models;

use Yii;
use yii\base\Model;
use yii\base\InvalidParamException;
use yii\db\ActiveRecord;
use app\models\Currency;

/**
 * Class StidioCreateForm
 * @package app\modules\cabinet\models
 * Модель формы регистрации студии.
 *
 * @property string $username Логин
 * @property string $password Пароль
 * @property boolean $rememberMe Запомнить меня
 */
class StudioCreateForm extends Model
{
	/**
	 * @var string $name Тип студии (ателье или магазин)
	 */
	protected  $type;

	/**
	 * @var string $name Название студии
	 */
	public $name;

	/**
	 * @var string $slogan Слоган студии
	 */
	public $slogan;

	/**
	 * @var string $description Описание студии
	 */
	public $description;

	/**
	 * @var string Экземпляр страны
	 */
	public $country;

	/**
	 * @var string Экземпляр города
	 */
	public $city;

	/**
	 * @var int|ActiveRecord Экземпляр валюты
	 */
	public $currency;

	/**
	 * @var int|ActiveRecord Экземпляр способа доставки
	 */
	public $delivery;

	/**
	 * @var string Собственный способ доставки
	 */
	public $custom_delivery;

    /**
     * @var int|ActiveRecord Экземпляр способа оплаты
     */
    public $payment;

    /**
     * @var string Собственный способ оплаты
     */
    public $custom_payment;

    /**
     * @var boolean $acceptAgreement Подтвердил ли пользователь соглашение владельца студии
     */
    public $acceptAgreement;

    public function __construct($type)
    {
        $this->type = $type;
        $this->validateType('type');
        $this->getCurrency();
        parent::__construct();
    }

    public function getType()
    {
        return ($this->type === 0 || $this->type === 'atelier') ? 'atelier' : 'store';
    }

    public function validateType($attribute)
    {
        if (!(
            $this->$attribute === 0 ||
            $this->$attribute === 1 ||
            $this->$attribute === 'atelier' ||
            $this->$attribute === 'store'
        )) {
            throw new InvalidParamException("Неверный тип студии (0, 1, 'atelier', 'store')");
        }
    }

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

    /**
     * Заполняет поле валюты значениями из базы
     */
	protected function getCurrency()
	{
		$this->currency = Currency::find()->asArray()->all();
	}
}
