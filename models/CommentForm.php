<?php

namespace app\models;

use yii\base\Model;

class CommentForm extends Model
{
    public $comment;
    public $post_id;

    public function rules()
    {
        return [
            [['comment', 'post_id' ] , 'required'],
            [['post_id'], 'integer'],
            [['comment'], 'string', 'max' => '400', 'min' => '10'],
            [['comment' ] , 'trim'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'post_id' => 'Post id',
            'comment' => 'Comment'
        ];
    }
}