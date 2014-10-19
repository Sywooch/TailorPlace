<?php

namespace app\models;

use yii\db\ActiveRecord;

class Payment extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%payment_list}}';
    }

    /**
     * Получить связанные студии
     * @return yii\db\ActiveQuery
     */
    public function getStudio()
    {
        return $this->hasMany(Studio::className(), ['id' => 'studio_id'])
            ->viaTable('studio_payment', ['payment_id' => 'id']);
    }
}