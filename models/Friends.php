<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "friends".
 *
 * @property int $id
 * @property int|null $page_id
 * @property int|null $friend_id
 */
class Friends extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'friends';
    }

    public function getPage()
    {
        return $this->hasOne(Pages::className() , ['id' => 'page_id']);
    }

    public function getFriend()
    {
        return $this->hasOne(Pages::className() , ['id' => 'page_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['page_id', 'friend_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page_id' => 'Page ID',
            'friend_id' => 'Friend ID',
        ];
    }
}
