<?php

namespace app\models;

use yii\base\Model;

class PostForm extends Model
{
    public $image;
    public $content;

    public function rules()
    {
        return [
            [['image', 'content'], 'required'],
            [['content'], 'string' , 'min' => '10', 'max' => '400', 'trim']
        ];
    }

    public function attributeLabels()
    {
        return [
            'image' => 'Image',
            'content' => 'Content'
        ];
    }
}