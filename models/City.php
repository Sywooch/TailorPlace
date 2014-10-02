<?php

namespace app\models;

use yii\db\ActiveRecord;

class City extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%city}}';
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Получить название города
     * @param  string $lang код языка
     * @return string
     */
    public function getName($lang = 'RU')
    {
        switch ($lang) {
            case 'RU':
                $name = $this->name_ru;
                break;

            case 'EN':
            default:
                $name = $this->name_en;
                break;
        }
        return $name;
    }

}
