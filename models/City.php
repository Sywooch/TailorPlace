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


    public static function getCityList($countryId = null, $like = null)
    {
        $Query = self::find()
            ->select(['name_ru as value', 'name_ru as  label','id'])->orderBy('value');
        $UnionQuery = self::find()
            ->select(['name_en as value', 'name_en as  label','id'])->orderBy('value');

        if ($countryId) {
            $Query->where(['country_id' => $countryId]);
            $UnionQuery->where(['country_id' => $countryId]);
            self::setCountryInSession($countryId);
        } elseif (isset($_SESSION['form_country_id'])) {
            $Query->where(['country_id' => $_SESSION['form_country_id']]);
            $UnionQuery->where(['country_id' => $_SESSION['form_country_id']]);
        }
        if ($like) {
            $Query->andWhere('name_ru like :name', [':name' => $like . '%']);
            $UnionQuery->andWhere('name_en like :name', [':name' => $like . '%']);
        }

        return $Query
            ->union($UnionQuery)
            ->asArray()
            ->all();
    }

    private static  function setCountryInSession($id)
    {
        $_SESSION['form_country_id'] = $id;
    }

}
