<?php

namespace app\models;

use yii\db\ActiveRecord;

class Delivery extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%delivery_list}}';
    }
}