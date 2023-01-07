<?php

namespace app\models;

use yii\base\Model;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

class PostForm extends Model
{
    public $imageFile;
    public $content;
    public $image;

    public function rules()
    {
        return [
            [['imageFile', 'content'], 'required'],
            [['content'], 'string' , 'min' => '10', 'max' => '400'],
            [['content'], 'trim'],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
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