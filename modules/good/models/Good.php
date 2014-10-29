<?php

namespace app\modules\good\models;

use Yii;
use yii\db\ActiveRecord;
use app\models\Delivery;
use app\models\Payment;

class Good extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%goods}}';
    }

    /**
     * Получить фотографии товара
     * @return yii\db\ActiveQuery
     */
    public function getPhotos()
    {
        return $this->hasMany(Photo::className(), ['id' => 'good_id']);
    }
}
