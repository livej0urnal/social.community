<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment_group}}`.
 */
class m230109_140642_create_comment_group_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment_group}}', [
            'id' => $this->primaryKey(),
            'post_id' => $this->integer(),
            'created_at' => $this->dateTime(),
            'comment' => $this->text(),
            'page_id' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%comment_group}}');
    }
}
