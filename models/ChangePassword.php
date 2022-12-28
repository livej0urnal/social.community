<?php

namespace app\models;

use yii\base\Model;

class ChangePassword extends Model
{
    public $password;
    public $new_password;
    public $new_password_repeat;

    public function rules()
    {
        return [
            [['password', 'new_password' , 'new_password_repeat'], 'required'],
            [['password', 'new_password_repeat', 'new_password'], 'string', 'min' => 6, 'max' => 20],
            ['new_password_repeat' , 'compare', 'compareAttribute' => 'new_password', 'message' => 'Confirm password and password do not match!'],
            ['password', 'validatePassword'],
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if(!$this->hasErrors())
        {
            $user = $this->getUser();
            if(!$user || !$user->validatePassword($this->password))
            {
                $this->addError($attribute , 'Don\'t validate password or email');
            }
        }

    }
}