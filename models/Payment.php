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
}