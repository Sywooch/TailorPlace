<?php 
namespace app\modules\cabinet\models;

use Yii;
use yii\base\Model;
use yii\base\InvalidParamException;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use app\models\Country;
use app\models\Currency;
use app\models\Delivery;
use app\models\Payment;

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
	 * @var string $address Адрес студии
	 */
	public $address;

	/**
	 * @var string Название страны
	 */
	public $countryName;

	/**
	 * @var int Id страны
	 */
	public $countryId;

	/**
	 * @var string Название города
	 */
	public $cityName;

	/**
	 * @var string Id города
	 */
	public $cityId;

	/**
	 * @var ActiveRecord Экземпляр валюты
	 */
	public $currency;

	/**
	 * @var int Id валюты
	 */
	public $currencyId;

	/**
	 * @var array Список способов доставки
	 */
	public $deliveryList;

	/**
	 * @var string Собственный способ доставки
	 */
	public $custom_delivery;

    /**
     * @var array Список способов оплаты
     */
    public $paymentList;

    /**
     * @var string Собственный способ оплаты
     */
    public $custom_payment;

    /**
     * @var boolean $acceptAgreement Подтвердил ли пользователь соглашение владельца студии
     */
    public $acceptAgreement;

    /**
     * @var array Список валют
     */
    public $currencyList;

    public function __construct($type)
    {
        $this->type = $type;
        $this->validateType('type');
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
	// public function rules()
	// {
	// 	// return [
	// 	// 	// Логин и пароль обязательны для заполнения.
	// 	// 	[['username', 'password'], 'required'],

	// 	// 	// Пароль валидируется функцией validatePassword().
	// 	// 	['password', 'validatePassword'],

	// 	// 	// [[rememberMe]] должен быть булево значение.
	// 	// 	['rememberMe', 'boolean']
	// 	// ];
	// }

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'name' => 'Название',
			'countryName' => 'Название страны',
			'cityName' => 'Название города',
			'currencyId' => 'Денежные единицы',
			'deliveryList' => 'Способ доставки',
			'paymentList' => 'Способ оплаты',
			'slogan' => 'Слоган',
			'description' => 'Описание',
		];
	}

    /**
     * Заполняет поле валюты значениями из базы
     */
    public function getCurrencyList()
	{
		if (!$this->currencyList) {
			$this->currencyList = Currency::find()->asArray()->all();
		}
		return $this->currencyList;
	}

    public function getDeliveryList()
	{
		if (!$this->deliveryList) {
			$this->deliveryList = Delivery::find()->asArray()->all();
		}
		return $this->deliveryList;
	}

    public function getPaymentList()
	{
		if (!$this->paymentList) {
			$this->paymentList = Payment::find()->asArray()->all();
		}
		return $this->paymentList;
	}

}
