<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $email
 * @property string $password
 */
class Users extends ActiveRecord implements IdentityInterface
{
    public $password_repeat;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'password', 'password_repeat'], 'required'],
            [['email', 'password', 'password_repeat'], 'string', 'max' => 255],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message'=>"Passwords don't match" ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Confirm password',
        ];
    }

    public function setPassword($password)
    {
        $this->password = sha1($password);
    }

    public function validatePassword($password)
    {
        return $this->password === sha1($password);
    }

    public static function findIdentity($id)
    {
        // TODO: Implement findIdentity() method.
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
        // return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        // TODO: Implement getId() method.
        return $this->id;
    }

    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
//        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
        //return $this->authKey === $auth_key;
    }
}
