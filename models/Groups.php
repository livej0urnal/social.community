<?php

namespace app\models;

use Yii;
use yii\base\Exception;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;
use yii\db\ActiveRecord;
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
class Groups extends ActiveRecord
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
            [['slug', 'short', 'title', 'is_private'], 'required'],
            [['short'], 'string'],
            [['is_private', 'admin'], 'integer'],
            [['slug', 'title', 'image', 'site', 'background'], 'string', 'max' => 255],
            [['imageFile'], 'file'],
            [['slug'], 'unique' , 'targetClass' => 'app\models\Groups'],
            [['title'], 'unique' , 'targetClass' => 'app\models\Groups'],
        ];
    }

    /**
     * @throws Exception
     */
    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            $this->image = 'uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
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
        ];
    }
}
