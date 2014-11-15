<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\modules\good\models\Good;

class GoodCategory extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%category_list}}';
    }

    /**
     * Получить связанные студии
     * @return \yii\db\ActiveQuery
     */
    public function getGoods()
    {
        return $this->hasMany(Good::className(), ['id' => 'good_id'])
            ->viaTable('good_category', ['good_id' => 'id']);
    }
}