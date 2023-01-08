<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%groups}}`.
 */
class m230108_155618_add_admin_column_to_groups_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('groups', 'admin', $this->integer(10));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('groups', 'admin');
    }
}
