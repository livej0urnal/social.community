<?php

namespace app\models;

use Yii;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;
use yii\base\Model;

/**
 * This is the model class for table "groups".
 *
 * @property int $id
 * @property string|null $slug
 * @property string|null $title
 * @property string|null $image
 * @property string|null $short
 * @property string|null $site
 * @property int|null $is_private
 * @property int|null $admin
 */
class Groups extends \yii\db\ActiveRecord
{
    public $imageFile;
    /**
     * @var string|UploadedFile|null
     */
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'groups';
    }

    public function getUsers()
    {
        return $this->hasMany(UsersGroup::className() , ['group_id' => 'id']);
    }

    public function getPosts()
    {
        return $this->hasMany(PostsGroup::className() , ['group_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['slug', 'short', 'title', 'image'], 'required'],
            [['short'], 'string'],
            [['is_private', 'admin'], 'integer'],
            [['slug', 'title', 'image', 'site', 'background'], 'string', 'max' => 255],
            [['slug'], 'unique' , 'targetClass' => 'app\models\Groups'],
            [['title'], 'unique' , 'targetClass' => 'app\models\Groups'],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $path  = 'uploads/'. date('Y-m-d') ;
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
            'slug' => 'Slug',
            'title' => 'Title',
            'image' => 'Image',
            'short' => 'Short',
            'site' => 'Site',
            'is_private' => 'Is Private',
            'admin' => 'Admin',
            'background' => 'Background'
        ];
    }
}
