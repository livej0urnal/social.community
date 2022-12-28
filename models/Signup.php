<?php

namespace app\models;

use yii\base\Model;
use app\models\User;

class Signup extends Model
{
    public $email;
    public $password;
    public $password_repeat;

    public function rules()
    {
        return [
            [['email' , 'password', 'password_repeat'], 'required'],
            ['email' , 'email'],
            ['email', 'unique', 'targetClass' => 'app/models/Users'],
            [['password', 'password_repeat'], 'string' , 'min' => 6, 'max' => 20],
            ['password_repeat' , 'compare', 'compareAttribute' => 'password', 'message' => 'Confirm password and password do not match!']
        ];

    }

    public function signup()
    {
        $user = new User();
        $user->email = $this->email;
        $user->setPassword($this->password);
        return $user->save();
    }


}