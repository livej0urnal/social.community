<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment_post}}`.
 */
class m230107_143528_create_comment_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment_post}}', [
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
        $this->dropTable('{{%comment_post}}');
    }
}
