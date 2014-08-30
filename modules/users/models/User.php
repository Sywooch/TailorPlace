<?php

namespace app\modules\users\models;

use \Yii;
use \yii\db\ActiveRecord;
use app\modules\users\models\query\UserQuery;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{

    /**
     * Переменная используется для сбора пользовательской информации, но не сохраняется в базу.
     * @var string $repassword Повторный пароль
     */
    public $repassword;

    /**
     * Переменная используется для сбора пользовательской информации, но не сохраняется в базу.
     * @var string $acceptAgreement Согласился ли пользователь с соглашением при регистрации
     */
    public $acceptAgreement;

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

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return [
            // Frontend scenarios
            'signup' => ['login', 'email', 'password', 'repassword', 'acceptAgreement'],
            'login' => ['login', 'password'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        //TODO поправить в каких сценариях применять фильтры
        return [
            // Логин [[login]]
            ['login', 'filter', 'filter' => 'trim', 'on' => ['signup','login']],
            ['login', 'required', 'on' => ['signup', 'login']],
            ['login', 'match', 'pattern' => '/^[a-zA-Z0-9_-]+$/', 'on' => ['signup', 'login']],
            ['login', 'string', 'min' => 3, 'max' => 30, 'on' => ['signup', 'login']],
            ['login', 'unique', 'on' => ['signup']],

            // E-mail [[email]]
            ['email', 'filter', 'filter' => 'trim', 'on' => ['signup', 'login', 'recovery', 'admin-update', 'admin-create']],
            ['email', 'required', 'on' => ['signup', 'login', 'recovery', 'admin-update', 'admin-create']],
            ['email', 'email', 'on' => ['signup', 'login', 'recovery', 'admin-update', 'admin-create']],
            ['email', 'string', 'max' => 100, 'on' => ['signup', 'login', 'recovery', 'admin-update', 'admin-create']],
            ['email', 'unique', 'on' => ['signup', 'admin-update', 'admin-create']],
            ['email', 'exist', 'on' => ['resend', 'recovery'], 'message' => 'Пользователь с указанным адресом не существует.'],

            // Пароль [[password]]
            ['password', 'required', 'on' => ['signup', 'login', 'password', 'admin-create']],
            ['password', 'string', 'min' => 6, 'on' => ['signup', 'login', 'password', 'admin-update', 'admin-create']],
            ['password', 'compare', 'compareAttribute' => 'oldpassword', 'operator' => '!==', 'on' => 'password'],

            // Подтверждение пароля [[repassword]]
            ['repassword', 'required', 'on' => ['signup', 'password', 'admin-create']],
            ['repassword', 'string', 'min' => 6, 'on' => ['signup', 'password', 'admin-update', 'admin-create']],
            ['repassword', 'compare', 'compareAttribute' => 'password', 'on' => ['signup', 'password', 'admin-create']],

            // Подтверждение соглашения [[acceptAgreement]]
            ['acceptAgreement', 'boolean', 'on' => ['signup']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'login' => 'Логин',
            'acceptAgreement' => 'Я согласен(а) с пользовательским соглашением',
            'password' => 'Пароль',
            'repassword' => 'Повторите пароль',
            'email' => 'E-mail',
        ];
    }
}
