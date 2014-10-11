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


    public static function getCityList($countryId = null)
    {
        $Query = self::find()
            ->select(['name_ru as value', 'name_ru as  label','id']);
        $UnionQuery = self::find()
            ->select(['name_en as value', 'name_en as  label','id']);

        if ($countryId) {
            $Query->where(['country_id' => $countryId]);
            $UnionQuery->where(['country_id' => $countryId]);
            $this->setCountryInSession($id);
        } elseif (isset($_SESSION['form_country_id'])) {
            
            $Query->where(['country_id' => $_SESSION['form_country_id']]);
            $UnionQuery->where(['country_id' => $_SESSION['form_country_id']]);
        }

        return $Query
            ->union($UnionQuery)
            ->orderBy('value')
            ->asArray()
            ->all();
    }

    private function setCountryInSession($id)
    {
        $_SESSION['form_country_id'] = $id;
    }

}
