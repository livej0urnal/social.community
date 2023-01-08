<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%groups}}`.
 */
class m230108_154916_create_groups_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%groups}}', array(
            'id' => $this->primaryKey(),
            'slug' => $this->string(255),
            'title' => $this->string(255),
            'image' => $this->string(255),
            'short' => $this->text(),
            'site' => $this->string(255)->null(),
            'is_private' => $this->integer(10),
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%groups}}');
    }
}
