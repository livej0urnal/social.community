<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pages}}`.
 */
class m221228_155701_create_pages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pages}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer('10'),
            'page_name' => $this->string('255')->unique(),
            'display_name' => $this->string('255')->unique(),
            'email' => $this->string('255'),
            'category_id' => $this->integer('10')->null(),
            'website_url' => $this->string('255'),
            'phone_number' => $this->string('255'),
            'about_page' => $this->text(),
            'linkedin_link' => $this->string('255'),
            'github_link' => $this->string('255'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pages}}');
    }
}
