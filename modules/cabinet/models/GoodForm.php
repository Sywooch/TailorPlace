<?php

namespace app\modules\cabinet\models;

use Yii;
use yii\base\Model;
use app\modules\studio\models\Studio;
use yii\base\InvalidParamException;

/**
 * Class GoodForm
 * Модель формы создания товара.
 * @package app\modules\cabinet\models
 */
class GoodForm extends Model
{
	/**
	 * @var string $name Название товара
	 */
	public $name;

	/**
	 * @var string Цена товара
	 */
	public $price;

	/**
	 * @var array Массив категорий товара
	 */
	public $categories;

	/**
	 * @var integer Кол-во товара (актуально только для магазина)
	 */
	public $quantity;

	/**
	 * @var string Описание товара
	 */
	public $description;

	/**
	 * @var Studio Модель студии, к которой принадлежит товар
	 */
	private $Studio;

	public function __construct(Studio $Studio, $config = [])
    {
        $this->Studio = $Studio;
        if (!$this->Studio->type) {
        	throw new InvalidParamException('Не указан тип студии');
        }
        parent::__construct($config = []);
    }

    public function isStoreGood()
    {
    	return $this->Studio->type === 'store';
    }
}