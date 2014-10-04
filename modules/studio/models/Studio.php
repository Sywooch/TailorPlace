<?php

namespace app\modules\studio\models;

use Yii;
use yii\db\ActiveRecord;

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
     * @return integer ID пользователя.
     */
    public function getId()
    {
        return $this->id;
    }

    public function getOwner()
    {
        return $this->hasOne(Studio::className(), ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     */
    // public function beforeSave($insert)
    // {
    // }

    /**
     * @inheritdoc
     */
    // public function afterSave($insert, $changedAttributes)
    // {
    // }
}
