<?php

namespace app\models;

use Yii;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "posts_group".
 *
 * @property int $id
 * @property int|null $page_id
 * @property string|null $content
 * @property string|null $image
 * @property string|null $created_at
 * @property int|null $group_id
 */
class PostsGroup extends \yii\db\ActiveRecord
{
    public $imageFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posts_group';
    }

    public function getPage()
    {
        return $this->hasOne(Pages::className() , ['id' => 'page_id']);
    }

    public function getGroup()
    {
        return $this->hasOne(Groups::className() , ['id' => 'group_id']);
    }


    public function getComments()
    {
        return $this->hasMany(CommentGroup::className() , ['post_id' => 'id']);
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['page_id', 'group_id'], 'integer'],
            [['content'], 'string'],
            [['created_at'], 'safe'],
            [['image'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $path  = 'uploads/posts/group/'. date('Y-m-d') ;
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
            'group_id' => 'Group ID',
        ];
    }
}
