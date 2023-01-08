<?php

namespace app\models;

use Yii;

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
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'groups';
    }

    public function getUserGroup()
    {
        return $this->hasMany(UsersGroup::className() , ['group_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['short'], 'string'],
            [['is_private', 'admin'], 'integer'],
            [['slug', 'title', 'image', 'site', 'background'], 'string', 'max' => 255],
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
            'short' => 'Short',
            'site' => 'Site',
            'is_private' => 'Is Private',
            'admin' => 'Admin',
            'background' => 'Background'
        ];
    }
}
