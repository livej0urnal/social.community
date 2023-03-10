<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string|null $slug
 * @property string|null $title
 * @property string|null $image
 * @property string|null $content
 * @property int|null $category_id
 * @property string|null $public_date
 * @property int|null $page_id
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className() , ['id' => 'category_id']);
    }

    public function getPage()
    {
        return $this->hasOne(Pages::className() , ['id' => 'page_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['category_id', 'page_id'], 'integer'],
            [['public_date'], 'safe'],
            [['slug', 'title', 'image'], 'string', 'max' => 255],
            [['slug'], 'unique', 'targetClass' => 'app\models\News'],
        ];
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
            'content' => 'Content',
            'category_id' => 'Category ID',
            'public_date' => 'Public Date',
            'page_id' => 'Page ID',
        ];
    }
}
