<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%pages}}`.
 */
class m230104_145825_add_image_column_to_pages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('pages', 'image', $this->string()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('pages', 'image');
    }
}
