<?php

namespace app\modules\studio\models;

use Yii;
use yii\db\ActiveRecord;
use app\models\Delivery;
use app\models\Payment;
use app\modules\good\models\Good;
use app\modules\users\models\User;

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
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Получить связанные со студией способы доставки
     * @return \yii\db\ActiveQuery
     */
    public function getDelivery()
    {
        return $this->hasMany(Delivery::className(), ['id' => 'delivery_id'])
            ->viaTable('studio_delivery', ['studio_id' => 'id']);
    }

    /**
     * Получить связанные со студией способы оплаты
     * @return \yii\db\ActiveQuery
     */
    public function getPayment()
    {
        return $this->hasMany(Payment::className(), ['id' => 'payment_id'])
            ->viaTable('studio_payment', ['studio_id' => 'id']);
    }

    public function getGoods()
    {
        return $this->hasMany(Good::className(), ['studio_id' => 'id'])->with('photos');
    }
}
