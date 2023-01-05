<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%feeds}}`.
 */
class m230105_111128_create_feeds_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%feeds}}', [
            'id' => $this->primaryKey(),
            'page_id' => $this->integer(10),
            'feed_id' => $this->integer(10)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%feeds}}');
    }
}
