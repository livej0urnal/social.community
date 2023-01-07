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
            [['content'], 'trim']
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $path  = 'uploads/posts/'. date('Y-m-d') ;
            FileHelper::createDirectory($path);
            $this->imageFile->saveAs($path . '/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            $this->image = '/' . $path . '/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
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