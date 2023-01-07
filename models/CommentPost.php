<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comment_post".
 *
 * @property int $id
 * @property int|null $post_id
 * @property string|null $created_at
 * @property string|null $comment
 * @property int|null $page_id
 */
class CommentPost extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment_post';
    }

    public function getPost()
    {
        return $this->hasOne(Posts::className() , ['id' => 'post_id']);
    }

    public function getUser()
    {
        return $this->hasOne(Pages::className(), ['id' => 'page_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['post_id', 'page_id'], 'integer'],
            [['created_at'], 'safe'],
            [['comment'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'post_id' => 'Post ID',
            'created_at' => 'Created At',
            'comment' => 'Comment',
            'page_id' => 'Page ID',
        ];
    }
}
