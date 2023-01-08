<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users_group".
 *
 * @property int $id
 * @property int|null $page_id
 * @property int|null $group_id
 */
class UsersGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['page_id', 'group_id'], 'integer'],
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
            'group_id' => 'Group ID',
        ];
    }
}
