<?php

namespace app\models;

use yii\base\Model;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

class PostForm extends Model
{
    public $image;
    public $content;

    public function rules()
    {
        return [
            [['image', 'content'], 'required'],
            [['content'], 'string' , 'min' => '10', 'max' => '400'],
            [['content'], 'trim'],
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $path  = 'uploads/posts/'. date('Y-m-d') ;
            FileHelper::createDirectory($path);
            $this->image->saveAs($path . '/' . $this->image->baseName . '.' . $this->image->extension);
            $this->image = '/' . $path . '/' . $this->image->baseName . '.' . $this->image->extension;
            return true;
        } else {
            return false;
        }
    }

    public function attributeLabels()
    {
        return [
            'image' => 'Image',
            'content' => 'Content'
        ];
    }


}