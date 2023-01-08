<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%groups}}`.
 */
class m230108_161649_add_background_column_to_groups_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('groups', 'background', $this->string(255));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('groups', 'background');
    }
}
