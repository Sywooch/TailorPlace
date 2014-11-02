<?php

namespace app\modules\good\models;

use Yii;
use yii\db\ActiveRecord;
use app\models\Delivery;
use app\models\Payment;

class Good extends ActiveRecord
{
    /**
     * @var array фотографии, чтозданные с помощью метода constructPhotoObject()
     */
    public $createdPhotos = [];

    /**
     * @var boolean Вызывался ли метод получения фотографий из базы
     */
    private $alreadyGetPhotos = false;

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
        $this->alreadyGetPhotos = true;
        return $this->hasMany(Photo::className(), ['good_id' => 'id']);
    }

    public function getMainPhoto()
    {
        return $this->hasMany(Photo::className(), ['good_id' => 'id'])
            ->where('main=1');
    }

    /**
     * Создать объект фотографии и прикрепить его к товару
     * @param  string $fileName Имя файла (опционально)
     * @return Photo Модель фотографии
     */
    public function constructPhotoObject($fileName = '')
    {
        $Photo = new Photo();
        $Photo->good_id = $this->id;
        if ($fileName !== '') {
            $Photo->file_name = $fileName;
        }
        array_push($this->createdPhotos, $Photo);
        return $Photo;
    }

    public function getAllPhotos()
    {
        if (is_array($this->photos)) {
            return array_merge($this->photos, $this->createdPhotos);
        } else {
            return $this->createdPhotos;
        }
    }

    /**
     * Если уже запрашивались фотографии из базы, то главная фотография ищется среди них,
     * иначе делается запрос главной фотографии к базе
     * @return Photo Модель фотографии
     */
    public function retunMainPhoto()
    {
        if ($this->alreadyGetPhotos) {
            foreach ($this->getAllPhotos() as $Photo) {
                if ((int)$Photo->main === 1) {
                    return $Photo;
                }
            }
        } else {
            return $this->mainPhoto;
        }
    }
}
