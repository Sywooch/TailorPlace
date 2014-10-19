<?php 
namespace app\modules\cabinet\models;

use Yii;
use yii\base\Model;
use yii\base\InvalidParamException;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use app\models\Country;
use app\models\City;
use app\models\Currency;
use app\models\Delivery;
use app\models\Payment;

/**
 * Class StudioForm
 * @package app\modules\cabinet\models
 * Модель формы регистрации студии.
 *
 * @property string $username Логин
 * @property string $password Пароль
 * @property boolean $rememberMe Запомнить меня
 */
class StudioForm extends Model
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

    public function __construct($type, $config = [])
    {
        $this->type = $type;
        $this->validateType('type');
        parent::__construct($config = []);
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

    public function fillCountry(\app\modules\users\models\User $User)
	{
		if (!$this->countryName && !$this->countryId) {
            $this->countryName = $User->country->name ? $User->country->name : null;
            $this->countryId = $User->country->id ? $User->country->id : null;
		}
	}

    public function fillCity(\app\modules\users\models\User $User)
	{
		if (!$this->cityName && !$this->cityId) {
            $this->cityName = $User->city->name ? $User->city->name : null;
            $this->cityId = $User->city->id ? $User->city->id : null;
		}
	}

    /**
     * @inheritdoc
     */
    public function rules()
    {
        //TODO поправить в каких сценариях применять фильтры. Скоректировать длины текстовых инпутов
        return [
            // Название [[name]]
            ['name', 'filter', 'filter' => 'trim'],
            ['name', 'required'],
            ['name', 'match', 'pattern' => '/^[a-zA-Zа-яА-Я0-9]+$/'],
            ['name', 'string', 'min' => 3, 'max' => 30],
            // ['name', 'unique'],

            // Страна [[countryName]]
            // Страна [[countryId]]
            ['countryName', 'filter', 'filter' => 'trim'],
            ['countryName', 'required'],
            ['countryId', 'validateCountryId', 'skipOnEmpty' => false],

            // Город [[cityName]]
            // Город [[cityId]]
            ['cityId', 'validateCityId', 'skipOnEmpty' => false],

            // Валюта [[currencyId]]
            ['currencyId', 'required'],
            ['currencyId', 'integer']

            // Способы доставки [[deliveryList]]
			['deliveryList', 'validateDeliveryList'],

            // другой способ доставки [[custom_delivery]]
			['custom_delivery', 'filter', 'filter' => 'trim'],
			['custom_delivery', 'filter', 'filter' => 'strip_tags'],
            ['custom_delivery', 'string', 'max' => 250],

            // Способы оплаты [[paymentList]]
			['paymentList', 'validateDeliveryList'],

            // другой способ оплаты [[custom_payment]]
			['custom_payment', 'filter', 'filter' => 'trim'],
			['custom_payment', 'filter', 'filter' => 'strip_tags'],
            ['custom_payment', 'string', 'max' => 250],

            // Слоган [[slogan]]
			['slogan', 'filter', 'filter' => 'trim'],
			['slogan', 'filter', 'filter' => 'strip_tags'],
            ['slogan', 'string', 'max' => 200],

            // Описание [[description]]
			['description', 'filter', 'filter' => 'trim'],
			['description', 'filter', 'filter' => 'strip_tags'],
            ['description', 'string', 'max' => 10000],

        ];
    }

    public function validateCountryId($attribute, $params)
    {
    	$id = (int)$this->countryId;
        if ($id == 0) {
            $this->addError('countryName', "Неправильно указана страна.");
        } elseif (!Country::findOne($id)) {
            // TODO добавить отправку уведомления об ошибке с данными на email разработчику
            $this->addError('countryName', "Указанная страна не существует.");
        }
    }

    public function validateCityId($attribute, $params)
    {
        $countryId = (int)$this->countryId;
        if(!$countryId){
            $this->addError('cityName', "Сначала укажите страну.");
        } else {
            $cityList = ArrayHelper::getColumn(City::getCityList($countryId), 'id');
            if (count($cityList) > 0) {
                if (!$this->$attribute) {
                    $this->addError('cityName', "Укажите города.");
                } elseif (!in_array($this->$attribute, $cityList)) {
                    // TODO добавить отправку уведомления об ошибке с данными на email разработчику
                    $this->addError('cityName', "У указанной страны нет такого города.");
                }
            }
        }
    }

    public function validateDeliveryList($attribute, $params)
    {
        $deliveryList = Delivery::findAll($this->deliveryList);
        if (count($deliveryList) != count($this->deliveryList)) {
            // TODO добавить отправку уведомления об ошибке с данными на email разработчику
            $this->addError('deliveryList', "Ошибка выбора способа доставки.");
        }
    }

    public function validatePaymentList($attribute, $params)
    {
        $paymentList = Payment::findAll($this->paymentList);
        if (count($paymentList) != count($this->paymentList)) {
            // TODO добавить отправку уведомления об ошибке с данными на email разработчику
            $this->addError('paymentList', "Ошибка выбора способа доставки.");
        }
    }

}
