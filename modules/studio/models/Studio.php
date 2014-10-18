<?php

namespace app\modules\studio\models;

use Yii;
use yii\db\ActiveRecord;
use app\models\Delivery;
use app\models\Payment;

class Studio extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%studio}}';
    }

    /**
     * Получить связанные со студией способы доставки
     * @return yii\db\ActiveQuery
     */
    public function getDelivery()
    {
        return $this->hasMany(Delivery::className(), ['id' => 'delivery_id'])
            ->viaTable('studio_delivery', 'studio_id' => 'id');
    }

    /**
     * Получить связанные со студией способы оплаты
     * @return yii\db\ActiveQuery
     */
    public function getPayment()
    {
        return $this->hasMany(Payment::className(), ['id' => 'payment_id'])
            ->viaTable('studio_payment', 'studio_id' => 'id');
    }
}
