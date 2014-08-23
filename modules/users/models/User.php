<?php

namespace app\modules\users\models;

use \Yii;
use \yii\db\ActiveRecord;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{

    public static function tableName()
    {
        return '{{%users}}';
    }

    /**
     * @inheritdoc
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }

    /**
     * Выбор пользователя по [[id]]
     * @param integer $id
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Выбор пользователя по [[username]]
     * @param string $username
     */
    public static function findByUsername($username)
    {
        return static::find()->where('username = :username', [':username' => $username])->one();
    }

    /**
     * @return integer ID пользователя.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string Ключ авторизации пользователя.
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * Валидация ключа авторизации.
     * @param string $authKey
     * @return boolean
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * Валидация пароля.
     * @param string $password
     * @return boolean
     */
    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password_hash);
    }

    /**
     * Валидация старого пароля.
     * В правилах модели метод назначен как валидатор атрибута модели.
     * @return boolean
     */
    public function validateOldPassword()
    {
        if (!$this->validatePassword($this->oldpassword)) {
            $this->addError('oldpassword', Yii::t('users', 'Неверный текущий пароль.'));
        }
    }

    /**
     * @return array [[DropDownList]] массив пользователей.
     */
    public static function getUserArray()
    {
        $key = self::CACHE_USERS_LIST_DATA;
        $value = Yii::$app->getCache()->get($key);
        if ($value === false || empty($value)) {
            $value = self::find()->select(['id', 'username'])->orderBy('username ASC')->asArray()->all();
            $value = ArrayHelper::map($value, 'id', 'username');
            Yii::$app->cache->set($key, $value);
        }
        return $value;
    }

    public function scenarios()
    {
        return [
            // Frontend scenarios
            'signup' => ['login', 'email', 'password', 'repassword'],
        ];
    }
}
