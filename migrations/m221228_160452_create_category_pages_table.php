<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category_pages}}`.
 */
class m221228_160452_create_category_pages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category_pages}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string('255')->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%category_pages}}');
    }
}
