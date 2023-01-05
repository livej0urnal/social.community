<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "feeds".
 *
 * @property int $id
 * @property int|null $page_id
 * @property int|null $feed_id
 */
class Feeds extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feeds';
    }

    public function getPage()
    {
        return $this->hasOne(Pages::className() , ['id' => 'page_id']);
    }

    public function getFeed()
    {
        return $this->hasOne(Pages::className() , ['id' => 'feed_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['page_id', 'feed_id'], 'integer'],
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
            'feed_id' => 'Feed ID',
        ];
    }
}
