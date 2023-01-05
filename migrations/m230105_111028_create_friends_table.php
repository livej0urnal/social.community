<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%friends}}`.
 */
class m230105_111028_create_friends_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%friends}}', [
            'id' => $this->primaryKey(),
            'page_id' => $this->integer(10),
            'friend_id' => $this->integer(10)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%friends}}');
    }
}
