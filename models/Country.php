<?php

namespace app\models;

use yii\db\ActiveRecord;

class Country extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%country}}';
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Получить название страны
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
