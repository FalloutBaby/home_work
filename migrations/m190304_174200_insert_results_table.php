<?php

use yii\db\Migration;

/**
 * Class m190304_174200_insert_results_table
 */
class m190304_174200_insert_results_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('departments', ['name', 'rank'], [
            ['Отдел 1', '1'],
            ['Отдел 2', '1'],
            ['Отдел 3', '1'],
            ['Отдел 4', '1'],
            ['Отдел 5', '1'],
            ['Отдел 6', '1'],
            ['Отдел 7', '1'],
            ['Отдел 8', '1'],
            ['Отдел 9', '1'],
            ['Отдел 10', '1'],
            ['Отдел 11', '1'],
            ['Отдел 12', '1'],
            ['Отдел 13', '1'],
            ['Отдел 14', '1']
        ]);
        
        $this->batchInsert('standards', ['name', 'measure_unit'], [
            ['Выполнение номенклатурного (подетального) плана ', '%'],
            ['Уровень управления качеством', 'балл'],
            ['Уровень культуры производства (уровень 5С)', '%'],
            ['Производительность на одного рабочего', 'н/час на 1 раб. в смену']
        ]);
        
        $rows = [
            ['1', '1.68', '1.64', '1.62', '2', '1'],
            ['2', '1.73', '1.65', null, '2', '1'],
            ['3', '1.79', '1.67', null, '2', '1'],
            ['4', '1.73', '1.65', null, '2', '1'],
            ['5', '1.90', '1.70', null, '2', '1'],
            ['6', '1.96', '1.71', null, '2', '1'],
            ['7', '2.02', '1.73', null, '2', '1'],
            ['8', '2.07', '1.74', null, '2', '1'],
            ['9', '2.13', '1.76', null, '2', '1'],
            ['10', '2.187', '1.77', null, '2', '1'], 
            ['11', '2.243', '1.785', null, '2', '1'],
            ['12', '2.30', '1.80', null, '2', '1'],
            
            ['1', '42', '40', '38', '3', '1'],
            ['2', '45', '42', null, '3', '1'],
            ['3', '49', '43', null, '3', '1'],
            ['4', '52', '45', null, '3', '1'],
            ['5', '56', '47', null, '3', '1'],
            ['6', '59', '49', null, '3', '1'], 
            ['7', '63', '51', null, '3', '1'],
            ['8', '66', '53', null, '3', '1'], 
            ['9', '70', '54', null, '3', '1'],
            ['10', '73', '56', null, '3', '1'], 
            ['11', '77', '58', null, '3', '1'],
            ['12', '80', '60', null, '3', '1'],
            
            ['1', null, null, null, '1', '1'],
            ['2', null, null, null, '1', '1'],
            ['3', null, null, null, '1', '1'],
            ['4', null, null, null, '1', '1'],
            ['5', null, null, null, '1', '1'],
            ['6', null, null, null, '1', '1'], 
            ['7', null, null, null, '1', '1'],
            ['8', null, null, null, '1', '1'], 
            ['9', null, null, null, '1', '1'],
            ['10', null, null, null, '1', '1'], 
            ['11', null, null, null, '1', '1'],
            ['12', null, null, null, '1', '1'],
           
            ['1', null, null, null, '4', '1'],
            ['2', null, null, null, '4', '1'],
            ['3', null, null, null, '4', '1'],
            ['4', null, null, null, '4', '1'],
            ['5', null, null, null, '4', '1'],
            ['6', null, null, null, '4', '1'], 
            ['7', null, null, null, '4', '1'],
            ['8', null, null, null, '4', '1'], 
            ['9', null, null, null, '4', '1'],
            ['10', null, null, null, '4', '1'], 
            ['11', null, null, null, '4', '1'],
            ['12', null, null, null, '4', '1'],
            
            ['1', '1.36', '1.34', '1.30', '2', '2'],
            ['2', '1.41', '1.38', null, '2', '2'],
            ['3', '1.47', '1.43', null, '2', '2'],
            ['4', '1.53', '1.47', null, '2', '2'],
            ['5', '1.58', '1.51', null, '2', '2'],
            ['6', '1.64', '1.55', null, '2', '2'],
            ['7', '1.70', '1.59', null, '2', '2'],
            ['8', '1.75', '1.63', null, '2', '2'],
            ['9', '1.81', '1.68', null, '2', '2'],
            ['10', '1.867', '1.72', null, '2', '2'],
            ['11', '1.92', '1.76', null, '2', '2'],
            ['12', '2.30', '1.80', null, '2', '2'],
                
            ['1', '29', '27', '24', '3', '2'],
            ['2', '33', '30', null, '3', '2'],
            ['3', '38', '33', null, '3', '2'],
            ['4', '43', '36', null, '3', '2'],
            ['5', '47', '39', null, '3', '2'],
            ['6', '52', '42', null, '3', '2'],
            ['7', '57', '45', null, '3', '2'],
            ['8', '61', '48', null, '3', '2'],
            ['9', '66', '51', null, '3', '2'],
            ['10', '71', '54', null, '3', '2'], 
            ['11', '75', '57', null, '3', '2'],
            ['12', '80', '60', null, '3', '2'],
            
            ['1', null, null, null, '1', '2'],
            ['2', null, null, null, '1', '2'],
            ['3', null, null, null, '1', '2'],
            ['4', null, null, null, '1', '2'],
            ['5', null, null, null, '1', '2'],
            ['6', null, null, null, '1', '2'], 
            ['7', null, null, null, '1', '2'],
            ['8', null, null, null, '1', '2'], 
            ['9', null, null, null, '1', '2'],
            ['10', null, null, null, '1', '2'], 
            ['11', null, null, null, '1', '2'],
            ['12', null, null, null, '1', '2'],
           
            ['1', null, null, null, '4', '2'],
            ['2', null, null, null, '4', '2'],
            ['3', null, null, null, '4', '2'],
            ['4', null, null, null, '4', '2'],
            ['5', null, null, null, '4', '2'],
            ['6', null, null, null, '4', '2'], 
            ['7', null, null, null, '4', '2'],
            ['8', null, null, null, '4', '2'], 
            ['9', null, null, null, '4', '2'],
            ['10', null, null, null, '4', '2'], 
            ['11', null, null, null, '4', '2'],
            ['12', null, null, null, '4', '2'],
        ];
        
        $this->batchInsert('results', ['month', 'goal', 'required', 'actual', 'stand_id', 'dept_id'], $rows);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190304_174200_insert_results_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190304_174200_insert_results_table cannot be reverted.\n";

        return false;
    }
    */
}
