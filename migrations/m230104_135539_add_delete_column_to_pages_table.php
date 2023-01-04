<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%pages}}`.
 */
class m230104_135539_add_delete_column_to_pages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('pages', 'delete', $this->integer()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('pages', 'delete');
    }
}
