<?php

namespace app\models;

use yii\base\Model;

class CommentForm extends Model
{
    public $comment;

    public function rules()
    {
        return [
            [['comment' ] , 'required'],
            [['comment'], 'string', 'max' => '400'],
            [['comment' ] , 'trim'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'comment' => 'Comment'
        ];
    }
}