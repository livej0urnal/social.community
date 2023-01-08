<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users_group}}`.
 */
class m230108_155452_create_users_group_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users_group}}', [
            'id' => $this->primaryKey(),
            'page_id' => $this->integer(),
            'group_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users_group}}');
    }
}
