<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%posts_group}}`.
 */
class m230108_164403_create_posts_group_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%posts_group}}', [
            'id' => $this->primaryKey(),
            'page_id' => $this->integer(),
            'content' => $this->text()->null(),
            'image' => $this->string('255')->null(),
            'created_at' => $this->timestamp()->defaultValue(null)->append('ON UPDATE CURRENT_TIMESTAMP'),
            'group_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%posts_group}}');
    }
}
