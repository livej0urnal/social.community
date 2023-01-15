<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m230115_144733_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'slug' => $this->string(255),
            'title' => $this->string(255),
            'image' => $this->string(255),
            'content' => $this->text(),
            'category_id' => $this->integer(10),
            'public_date' => $this->dateTime(),
            'page_id' => $this->integer(10)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%news}}');
    }
}
