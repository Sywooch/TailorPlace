<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\modules\studio\models\Studio;

class Delivery extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%delivery_list}}';
    }

    /**
     * Получить связанные студии
     * @return yii\db\ActiveQuery
     */
    public function getStudios()
    {
        return $this->hasMany(Studio::className(), ['id' => 'studio_id'])
            ->viaTable('studio_delivery', ['drlivery_id' => 'id']);
    }
}