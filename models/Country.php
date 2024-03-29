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

    /**
     * Возвращает список стран на разных языках для автодополнения
     * @param  string|null $like Начальные символы названия страны
     * @return array
     */
    public static function getCountryList($like = null)
    {
        $Query = self::find()
            ->select(['name_ru as value', 'name_ru as  label','id'])->orderBy('value');
        $UnionQuery = self::find()
            ->select(['name_en as value', 'name_en as  label','id'])->orderBy('value');

        if ($like) {
            $Query->where('name_ru like :name', [':name' => $like . '%']);
            $UnionQuery->where('name_en like :name', [':name' => $like . '%']);
        }

        return $Query
            ->union($UnionQuery)
            ->asArray()
            ->all();
    }

}
