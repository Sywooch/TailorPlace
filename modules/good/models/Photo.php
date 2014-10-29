<?php

namespace app\modules\good\models;

use Yii;
use yii\db\ActiveRecord;

class Photo extends ActiveRecord
{
    private static $photoDir = false;
    private static $webPhotoDir = '/photos/good';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%good_photos}}';
    }

    /**
     * Получить товар данной фотографии
     * @return yii\db\ActiveQuery
     */
    public function getGood()
    {
        return $this->hasOhe(Photo::className(), ['goood_id' => 'id']);
    }

    /**
     * Получить путь к папке с фотографиями товара, к которому относится данная фотография
     * @return string
     */
    public function getDir()
    {
        if (is_numeric($this->good_id)) {
            return self::getWebRootDir() . '/' . $this->good_id . '/';
        } else {
            return false;
        }
    }

    /**
     * Получить путь к текущему файлу
     * @param  boolean $toSmallFile Получить путь к уменьшеной копии фотографии
     * @return string|boolean
     */
    public function getDiskPath($toSmallFile = false)
    {
        if (is_numeric($this->good_id) && isset($this->file_name)) {
            $fileName = $toSmallFile ? $this->getSmallName() : $this->file_name;
            return self::getWebRootDir() . '/' . $this->good_id . '/' . $fileName;
        } else {
            return false;
        }
    }

    /**
     * Получить ссылку к фотографии
     * @param  boolean $toSmallFile Ссылка на уменьшеную копию фотографии
     * @return string|boolean
     */
    public function getWebPath($toSmallFile = false)
    {
        if (is_numeric($this->good_id) && isset($this->file_name)) {
            $fileName = $toSmallFile ? $this->getSmallName() : $this->file_name;
            return self::$webPhotoDir . '/' . $this->good_id . '/' . $fileName;
        } else {
            return false;
        }
    }

    /**
     * Получить путь к директории со всеми фотографиями товаров
     * @return string
     */
    public static function getWebRootDir()
    {
        if (self::$photoDir === false) {
            self::$photoDir = Yii::getAlias('@webroot') . self::$webPhotoDir;
        }
        return self::$photoDir;
    }

    /**
     * Получить имя файла уменьшенной фотографии
     * @return [type] [description]
     */
    private function getSmallName()
    {
        if (!$this->file_name) {
            return false;
        }

        $dotPos = strrpos($this->file_name, '.');
        return substr($this->file_name, 0, $dotPos) . '_small' . substr($this->file_name, $dotPos);
    }
}
