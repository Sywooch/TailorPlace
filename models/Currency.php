<?php

namespace app\models;

use yii\db\ActiveRecord;

class Currency extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%currency}}';
    }
}
