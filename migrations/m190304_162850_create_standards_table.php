<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%indication}}`.
 */
class m190304_162850_create_standards_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%standards}}', [
            'id' => $this->primaryKey(),
            'name' => $this->text()->notNull(),
            'measure_unit' => $this->string(50)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%indication}}');
    }
}
