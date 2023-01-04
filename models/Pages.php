<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use yii\base\Model;

/**
 * This is the model class for table "pages".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $page_name
 * @property string|null $display_name
 * @property string|null $email
 * @property int|null $category_id
 * @property string|null $website_url
 * @property string|null $phone_number
 * @property string|null $about_page
 * @property string|null $linkedin_link
 * @property string|null $github_link
 */
class Pages extends Model
{
    public $imageFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pages';
    }

    public function getCategory()
    {
        return $this->hasOne(CategoryPages::className() , ['id' => 'category_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'category_id'], 'integer'],
            [['about_page'], 'string'],
            [['page_name', 'display_name', 'email', 'category_id', 'phone_number'], 'required'],
            ['email', 'email'],
            [['page_name', 'display_name', 'email', 'image', 'website_url', 'phone_number', 'linkedin_link', 'github_link'], 'string', 'max' => 255],
            [['page_name'], 'unique'],
            [['display_name'], 'unique'],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $saveFile = $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            $this->image = $saveFile;
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
            'user_id' => 'User ID',
            'page_name' => 'Page Name',
            'display_name' => 'Display Name',
            'email' => 'Email',
            'category_id' => 'Category',
            'website_url' => 'Website Url',
            'phone_number' => 'Phone Number',
            'about_page' => 'About Page',
            'linkedin_link' => 'Linkedin',
            'github_link' => 'Github',
            'image' => 'Avatar'
        ];
    }
}
