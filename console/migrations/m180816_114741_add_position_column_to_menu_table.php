<?php

use yii\db\Migration;

/**
 * Handles adding position to table `menu`.
 */
class m180816_114741_add_position_column_to_menu_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
	    $this->alterColumn('menu','title','string NOT NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
