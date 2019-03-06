<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%results}}`.
 */
class m190304_165325_create_results_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%results}}', [
            'id' => $this->primaryKey(),
            'month' => $this->integer(),
            'goal' => $this->double(),
            'required' => $this->double(),
            'actual' => $this->double(),
            'stand_id' => $this->integer(),
            'dept_id' => $this->integer(),
        ]);
        
        $this->addForeignKey('fk_results_standards', 'results', 'stand_id', 'standards', 'id');
        $this->addForeignKey('fk_results_departments', 'results', 'dept_id', 'departments', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%results}}');
    }
}
