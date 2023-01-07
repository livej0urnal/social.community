<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\base\Model;

/**
 * This is the model class for table "posts".
 *
 * @property int $id
 * @property int|null $page_id
 * @property string|null $content
 * @property string|null $image
 * @property string|null $created_at
 */
class Posts extends \yii\db\ActiveRecord
{

    public $imageFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posts';
    }

    public function getPage()
    {
        return $this->hasOne(Pages::className() , ['id' => 'page_id']);
    }

    public function getComments()
    {
        return $this->hasMany(CommentPost::className() , ['post_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['page_id'], 'integer'],
            [['content'], 'string'],
            [['created_at'], 'safe'],
            [['image'], 'string', 'max' => 255],
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

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page_id' => 'Page ID',
            'content' => 'Content',
            'image' => 'Image',
            'created_at' => 'Created At',
        ];
    }
}
